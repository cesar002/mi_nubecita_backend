<?php

namespace App\Http\Controllers;

use App\TokenConfirmacionCuentaAsociadoUsuarios;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class VerificacionCorreoController extends Controller{

    public function verificarCorreo(string $token) : JsonResponse{
        try{
            $tokenAsociado = TokenConfirmacionCuentaAsociadoUsuarios::where();
        }catch(Exception $e){
            Log::error($e->getMessage());
            return \response()->json([
                "status" => 0,
                "mensaje" => "error al verificar el correo, intente nuevamente"
            ], 501);
        }
    }

}
