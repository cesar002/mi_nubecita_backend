<?php

namespace App\Http\Controllers;

use App\TokenConfirmacionCuentaAsociadoUsuarios;
use App\TokensConfirmacionCuentas;
use App\NubesUsuarios;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class VerificacionCorreoController extends Controller{

    public function verificarCorreo(string $token) : JsonResponse{
        try{
            $data = TokensConfirmacionCuentas::where('tokens_confirmacion_cuentas.token', $token)->where('tokens_confirmacion_cuentas.activo', true)
                        ->join('token_confirmacion_cuenta_asociado_usuarios', 'token_confirmacion_cuenta_asociado_usuarios.id_token', '=', 'tokens_confirmacion_cuentas.id_token_confirmacion')
                        ->join('users', 'users.id', '=', 'token_confirmacion_cuenta_asociado_usuarios.id_usuario')
                        ->select('token_confirmacion_cuenta_asociado_usuarios.id', 'token_confirmacion_cuenta_asociado_usuarios.fecha_limite', 'users.email', 'users.id','tokens_confirmacion_cuentas.id_token_confirmacion')->first();
            if(is_null($data)){
                return response()->json(['status' => 2, 'mensaje' => 'Clave de verificación incorrecta'], 201);
            }

            if(!$this->compareFechaLimiteToken($data->fecha_limite)){
                return response()->json(['status' => 2, 'mensaje' => 'La clave de verificación de su cuenta ha expirado'], 201);
            }


            DB::beginTransaction();

            $confirmacion = TokenConfirmacionCuentaAsociadoUsuarios::find($data->id);
            $confirmacion->fecha_uso = Carbon::now();
            $confirmacion->save();

            $tokenVerificacion = TokensConfirmacionCuentas::where('id_token_confirmacion', $data->id_token_confirmacion)->first();
            $tokenVerificacion->activo = false;
            $tokenVerificacion->save();

            $user = User::where('email', $data->email)->first();
            $user->validado = true;
            $user->save();

            $nubeName = str_random(rand(16, 26));
            Storage::makeDirectory($nubeName);
            NubesUsuarios::create([
                'hash_name' => $nubeName,
                'id_usuario' => $data->id,
                'activo' => true
            ]);

            DB::commit();

            return response()->json(['status' => 1, 'mensaje' => 'Su cuenta ha sido verificada con éxito, inicie sesión para comenzar a almacenar'], 201);
        }catch(Exception $e){
            DB::rollBack();

            Log::error($e->getMessage());
            return \response()->json([
                "status" => 0,
                "mensaje" => "error al verificar el correo, intente mas tarde"
            ], 501);
        }catch(Error $err){
            DB::rollBack();

            Log::error($err->getMessage());
            return \response()->json([
                "status" => 0,
                "mensaje" => "error al verificar el correo, intente mas tarde"
            ], 501);
        }
    }

    /**
     * Compara si la fecha actual es menor a la fecha de entrada limite
     *
     * @param string $fechaLimite
     * @return boolean
     */
    private function compareFechaLimiteToken(string $fechaLimite) : bool{
        return Carbon::now()->lte(Carbon::parse($fechaLimite));
    }

}
