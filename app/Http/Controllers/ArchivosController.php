<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\ArchivosSubidos;
use App\CarpetasUsuarios;
use Illuminate\Support\Facades\Log;

class ArchivosController extends Controller{

    public function uploadFiles(Request $request) : JsonResponse{
        $fileUpload = null;
        try{
            $filesRepetidos = [];
            $files = $request->allFiles()['files'];
            $cloud = auth()->user()->nubeUsuario()->first();
            $carpetaUsuario = CarpetasUsuarios::where('id_nube', $cloud->id_nube)->where('nombre_carpeta', 'root')->first();

            DB::beginTransaction();
            foreach($files as $file){
                if(!$this->existFileUpload($carpetaUsuario->id_carpeta, $file->getClientOriginalName(), $file->getMimeType())){
                    $fileUpload = Storage::putFile($cloud->hash_name, $file);
                    ArchivosSubidos::create([
                        'id_carpeta' => $carpetaUsuario->id_carpeta,
                        'nombre_privado' => basename($fileUpload),
                        'nombre_archivo' => $file->getClientOriginalName(),
                        'tipo_archivo' => $file->getMimeType(),
                        'size_file' => $this->convertSizeFileToKB($file->getSize()),
                    ]);
                }else{
                    array_push($filesRepetidos, ['fileName' => $file->getClientOriginalName()]);
                }
            }
            DB::commit();
            return response()->json([
                'status' => 1,
                'mensaje' => 'Archivo subido con éxito',
                'repetidos' => $filesRepetidos,
            ], 200);
        }catch(Exception $e){
            Log::error($e->getMessage());
            DB::rollBack();

            if(Storage::exists($fileUpload)){
                Storage::delete($fileUpload);
            }

            return response()->json(['status'=>0, 'mensaje' => 'Error al subir el archivo'], 500);
        }
    }

    public function totalStorageInUse() : JsonResponse{
        $total = auth()->user()->nubeUsuario()->where('id_nube', 1)->first()->carpetas()->archivos();//->archivos()->sum('size_file');
        \Debugbar::info($total);
        return response()->json([]);
    }

    private function convertSizeFileToKB($size){
        $kbSize = $size * 0.001;
        return bcdiv($kbSize, '1', 2);
    }

    private function existFileUpload(int $idCarpeta, string $nombreArchivo, string $typeFile) : bool{
        $archivo = ArchivosSubidos::where('id_carpeta', $idCarpeta)->where('nombre_archivo', $nombreArchivo)->where('tipo_archivo', $typeFile)->first();
        return !is_null($archivo);
    }

    /*
    // $wea = $request->allFiles();
            // foreach($wea['files'] as $f){
            //     \Debugbar::info($f);
            // }
            // \Debugbar::info($wea);
            // \Debugbar::info($carpeta);
            // \Debugbar::info($cloud);
            // \Debugbar::info($cloud->id_carpeta);
            // \Debugbar::info($db->getClientOriginalName());
            // \Debugbar::info($file->getMimeType());
            // \Debugbar::info($file->getSize());
            //pathinfo($wea, PATHINFO_FILENAME)
    */

}
