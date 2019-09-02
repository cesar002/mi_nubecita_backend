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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller{

    /**
     * crea una nueva instancia de AuthController
     */
    public function __construct(){
        $this->middleware('auth:api', ['except' => ['login', 'registrarse']]);
    }

    public function registrarse(Request $request) : JsonResponse{
        try{
            $validation = $this->validateRequestRegistrarse($request->all());
            if(!is_null($validation)){
                return response()->json([
                    "status" => 2,
                    "errors" => $validation,
                ], 201);
            }

            DB::beginTransaction();

            $user = User::create([
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            $tokenVerify = TokensConfirmacionCuentas::create([
                'token' => str_random(50),
            ]);

            $tokenAsignado = TokenConfirmacionCuentaAsociadoUsuarios::create([
                'id_usuario' => $user->id,
                'id_token' => $tokenVerify->id_token_confirmacion,
                'fecha_limite' => Carbon::now()->addDays(7),
            ]);

            $token = $tokenVerify->token;

            // Mail::to($user->email)->send(new UserVerifyMail($token));

            DB::commit();

            return response()->json([
                'status' => 1,
                'mensaje' => 'Registro éxitoso, un mensaje a sido mandado a su correo, entre y verifique su cuenta',
            ], 201);
        }catch(Exception $e){
            DB::rollBack();

            Log::error($e->getMessage());

            return response()->json([
                'status' => 0,
                'mensaje' => 'Error desconocido, intente más tarde',
            ],501);
        }
    }

    /**
     * retorna el token JWT desde las credenciales
     *
     * @return JsonResponse
     */
    public function login(Request $request) : JsonResponse{
        $validation = $this->validateRequestLogin($request->all());
        if(!is_null($validation)){
            return response()->json([
                "status" => 2,
                "mensajes" => $validation,
            ], 202);
        }

        if(! $token = auth()->attempt($request->only('email', 'password'))){
            return response()->json(['status' => 2, 'mensaje' => 'Usuario y/o contraseña incorrecta'], 202);
        }



        return $this->respondWithtoken($token);
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
        try{
            auth()->logout();

            return response()->json([
                'status' => 1,
                'mensaje' => 'Deslogeo exitoso',
            ], 201);
        }catch(Exception $e){
            Log::error($e->getMessage());

            return response()->json([
                'status' => 0,
                'mensaje' => 'error desconocido, intente más tarde'
            ]);
        }
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
            'status' => 1,
            'access_token'  => $token,
            'token_type'    => 'bearer',
            'expires_in'    => auth('api')->factory()->getTTL() * 60
        ]);
    }

    /**
     * Verifica los datos del request de entrada del metodo registrarse, retorna null si los datos son correctos, si no, retornará un arreglo con los errores
     *
     * @param array $_request
     * @return array|null
     */
    private function validateRequestRegistrarse(array $_request) : ?array{
        $rules = [
            "email" => "required|unique:users,email",
            "password" => "confirmed"
        ];

        $validator = Validator::make($_request, $rules);

        if($validator->passes()){
            return null;
        }

        return $validator->errors()->all();
    }

    /**
     * Valida el request de entrada del metodo login, verifica si el email existe, si lo hace, retornará null, si no, retornará un arreglo de errores
     *
     * @param array $_request
     * @return array|null
     */
    private function validateRequestLogin(array $_request) : ?array{
        $rules = [
            "email" => "required|exists:users,email"
        ];

        $validator = Validator::make($_request, $rules);

        if($validator->passes()){
            return null;
        }

        return $validator->errors()->all();
    }


}
