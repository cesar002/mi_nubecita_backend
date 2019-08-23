<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller{

    /**
     * crea una nueva instancia de AuthController
     */
    public function __construct(){
        $this->middleware('auth:api', ['except' => ['login']]);
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
