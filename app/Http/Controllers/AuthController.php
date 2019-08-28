<?php

namespace App\Http\Controllers;

use App\Mail\UserVerifyMail;
use App\TokenConfirmacionCuentaAsociadoUsuarios;
use App\TokensConfirmacionCuentas;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use function Psy\debug;

class AuthController extends Controller{

    /**
     * crea una nueva instancia de AuthController
     */
    public function __construct(){
        $this->middleware('auth:api', ['except' => ['login', 'registrarse']]);
    }

    public function registrarse() : JsonResponse{
        try{
            // DB::beginTransaction();

            // $user = User::create([
            //     'email' => request('email'),
            //     'password' => bcrypt(request('password')),
            // ]);

            // $tokenVerify = TokensConfirmacionCuentas::create([
            //     'token' => str_random(50),
            // ]);

            // $tokenAsignado = TokenConfirmacionCuentaAsociadoUsuarios::create([
            //     'id_usuario' => $user->id,
            //     'id_token' => $tokenVerify->id,
            //     'fecha_limite' => Carbon::now()->addDays(7),
            // ]);

            // $token = $tokenVerify->token;

            Mail::to('juliocastillo_13@hotmail.com')->send(new UserVerifyMail('asdasdasdasd'));

            // DB::commit();

            return response()->json([
                'status' => 1,
                'mensaje' => 'Registro éxitoso, un mensaje a sido mandado a su correo, entre y verifique su cuenta',
            ], 220);
        }catch(Exception $e){
            DB::rollBack();
            return response()->json([
                'status' => 0,
                'mensaje' => $e->getMessage(),
                'code' => $e->getCode()
            ], 401);
        }
    }

    /**
     * retorna el token JWT desde las credenciales
     *
     * @return JsonResponse
     */
    public function login() : JsonResponse{
        $credentials = request(['email', 'password']);

        if(! $token = auth()->attempt($credentials)){
            return response()->json(['error' => ''], 401);
        }

        // return $this->response
    }

    /**
     * retorna los datos del usuario autenticado
     *
     * @return JsonResponse
     */
    public function me() : JsonResponse{
        return response()->json(auth()->user());
    }

    /**
     * Desloguea al usuario e invalida el token
     *
     * @return JsonResponse
     */
    public function logout() : JsonResponse{
        auth()->logout();

        return response()->json([
            'mensaje' => 'Deslogeo exitoso',
        ], 201);
    }

    /**
     * Refresca el token de acceso
     *
     * @return JsonResponse
     */
    public function refresh() : JsonResponse{
        return $this->respondWithtoken(auth()->refresh());
    }


    /**
     * Retorna la estructura del token en formato json
     *
     * @param String $token
     * @return JsonResponse
     */
    protected function respondWithtoken(String $token) : JsonResponse{
        return response()->json([
            'access_token'  => $token,
            'token_type'    => '',
            'expires_in'    => auth()->factory()->getTTL() * 60
        ]);
    }


}
