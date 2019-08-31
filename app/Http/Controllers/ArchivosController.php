<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Input;

class ArchivosController extends Controller{

    public function uploadFiles(Request $request) : JsonResponse{
        \Debugbar::info($request->files);
        \Debugbar::info(Input::file($request->files));
        return response()->json();
    }

}
