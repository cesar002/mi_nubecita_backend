<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class RecuperacionPasswordController extends Controller{
    
    public function registrarTokenRecuperacion(Request $request) : JsonResponse{
        try{

        }catch(Exception $err){
            Log::error($err->getMessege());
            return response()->json(['status'=> 0, 'Error desconocido, intente mas tarde'], 501);
        }
    }

    public function validarToken(String $token, Request $request) : JsonResponse{
        try{

        }catch(Exception $err){
            return response()->json();
        }
        
    }

}
