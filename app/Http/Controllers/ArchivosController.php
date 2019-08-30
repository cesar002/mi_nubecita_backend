<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ArchivosController extends Controller{

    public function uploadFiles(Request $request) : JsonResponse{
        dd($request->allFiles());
        return response()->json();
    }

}
