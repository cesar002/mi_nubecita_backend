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
        $user = User::where('email', $request['email'])->where('validado', true)->first();

        if(isEmpty($user)){
            return $next($request);
        }

        return response()->json([
            "error" => "usuario no existente"
        ], 401);
    }
}
