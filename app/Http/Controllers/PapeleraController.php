<?php

namespace App\Http\Controllers;

use App\ArchivosBorrados;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PapeleraController extends Controller{

    public function getFiles() : JsonResponse{
        $idPapelera = auth()->user()->nubeUsuario()->first()->papelera()->first()->id_papelera;
        $archivosBorrados = ArchivosBorrados::where('id_papelera', $idPapelera)->first()->archivo()->first();
        \Debugbar::info($archivosBorrados);
        return response()->json(['res' => $archivosBorrados]);
    }

}
