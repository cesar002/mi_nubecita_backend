<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class CheckUserEmailVerify
{
    /**
     * Verifica si un usuario ya fue verificado
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = User::where('email', $request->email)->where('activo', true)->first();

        if(!is_null($user)){
            return $next($request);
        }

        return response()->json([
            "status" => 2,
            "mensaje" => "El correo con el que está intentando acceder no existe o no ha sido verificado, compruebe su información"
        ], 201);
    }
}
