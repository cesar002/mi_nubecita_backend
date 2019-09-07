<?php

namespace App\Http\Middleware;

use Closure;

class CheckLimiteAlmacenaje
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $carpeta = auth()->user()->nubeUsuario()->where('id_nube', 1)->first()->carpetas()->where('nombre_carpeta', 'root')->first();
        // $total = $carpeta->archivos->sum('size_file');
        $total = 0;
        $limite = auth()->user()->limiteAlmacenaje()->first();
        foreach($request->allFiles()['files'] as $file){
            $total = $total + $file->getSize();
        }

        if($total > $limite->limite){
            return response()->json([
                'status' => 2,
                'mensaje' => 'El  tamaño de los archivos que está intentado subir, supera su limite de almacenaje'
            ], 500);
        }
        return $next($request);
    }
}
