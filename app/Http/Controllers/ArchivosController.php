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
use Illuminate\Support\Facades\Crypt;

class ArchivosController extends Controller{

    /**
     * Sube los archivos a la nube del usuario
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function uploadFiles(Request $request) : JsonResponse{
        $fileUpload = null;
        try{
            $filesRepetidos = [];
            $archivosResp = [];
            $files = $request->allFiles()['files'];
            $cloud = auth()->user()->nubeUsuario()->first();
            $carpetaUsuario = CarpetasUsuarios::where('id_nube', $cloud->id_nube)->where('nombre_carpeta', 'root')->first();

            DB::beginTransaction();
            foreach($files as $file){
                if(!$this->existFileUpload($carpetaUsuario->id_carpeta, $file->getClientOriginalName(), $file->getMimeType())){
                    $fileUpload = Storage::putFile($cloud->hash_name, $file);
                    $archivoSubido = ArchivosSubidos::create([
                        'id_carpeta' => $carpetaUsuario->id_carpeta,
                        'nombre_privado' => basename($fileUpload),
                        'nombre_archivo' => $file->getClientOriginalName(),
                        'tipo_archivo' => $file->getMimeType(),
                        'size_file' => $file->getSize(),
                    ]);
                    array_push($archivosResp, [
                        'idArchivo' =>Crypt::encrypt($archivoSubido->id_archivo),
                        'nombreCorto' => $this->getNombreCorto($file->getClientOriginalName()),
                        'nombre' => $file->getClientOriginalName(),
                        'size' => $file->getSize(),
                        'fechaSubida' => ArchivosSubidos::where('id_archivo', $archivoSubido->id_archivo)->first()->fecha_subida,
                        'tipo' =>  substr($file->getMimeType(), strpos($file->getMimeType(), "/")+1),
                    ]);
                }else{
                    array_push($filesRepetidos, ['fileName' => $file->getClientOriginalName()]);
                }
            }
            DB::commit();
            return response()->json([
                'status' => 1,
                'mensaje' => 'Archivos subido con éxito',
                'archivos' => $archivosResp,
                'repetidos' => $filesRepetidos,
                'enUso' => $this->getEnUso(),
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

    /**
     * Retorna la lista de archivos que se encuentran en la raíz
     *
     * @return JsonResponse
     */
    public function getFiles() : JsonResponse{
        $idNube = auth()->user()->nubeUsuario()->first()->id_nube;
        $idCarpeta = CarpetasUsuarios::where('id_nube', $idNube)->where('nombre_carpeta', 'root')->first()->id_carpeta;
        $archivos = ArchivosSubidos::where('id_carpeta', $idCarpeta)->get();

        if(is_null($archivos)){
            return response()->json([]);
        }

        $archivosResp = [];
        foreach($archivos as $archivo){
            array_push($archivosResp, [
                'idArchivo' => Crypt::encrypt($archivo->id_archivo),
                'nombreCorto' => $this->getNombreCorto($archivo->nombre_archivo),
                'nombre' => $archivo->nombre_archivo,
                'size' => $archivo->size_file,
                'fechaSubida' => $archivo->fecha_subida,
                'tipo' => substr($archivo->tipo_archivo, strpos($archivo->tipo_archivo,"/")+1),
            ]);
        }

        return response()->json($archivosResp);
    }

    private function getNombreCorto(string $nombre) : string{
        return strlen($nombre) >= 10? substr($nombre, 0, 10).'...' : $nombre;
    }

    private function existFileUpload(int $idCarpeta, string $nombreArchivo, string $typeFile) : bool{
        $archivo = ArchivosSubidos::where('id_carpeta', $idCarpeta)->where('nombre_archivo', $nombreArchivo)->where('tipo_archivo', $typeFile)->first();
        return !is_null($archivo);
    }

    private function getEnUso() : int{
        $carpeta = auth()->user()->nubeUsuario()->where('id_nube', 1)->first()->carpetas()->where('nombre_carpeta', 'root')->first();
        $total = $carpeta->archivos->sum('size_file');
        return $total;
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
