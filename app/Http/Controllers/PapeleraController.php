<?php

namespace App\Http\Controllers;

use App\ArchivosBorrados;
use App\ArchivosSubidos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Crypt;

class PapeleraController extends Controller{

    public function getFiles() : JsonResponse{
        try{
            $archivosResp = [];
            $idPapelera = auth()->user()->nubeUsuario()->first()->papelera()->first()->id_papelera;
            $archivosBorrados = ArchivosBorrados::where('id_papelera', $idPapelera)->where('activo', true)->get();
            foreach ($archivosBorrados as $archivoBorrado) {
                $archivo = ArchivosSubidos::where('id_archivo', $archivoBorrado->id_archivo)->first();
                array_push($archivosResp,[
                    'idArchivo' => Crypt::encrypt($archivo->id_archivo),
                    'idArchivoBorrado' => Crypt::encrypt($archivoBorrado->id_archivo_borrado),
                    'nombreCorto' => $this->getNombreCorto($archivo->nombre_archivo),
                    'nombre' => $archivo->nombre_archivo,
                    'size' => $archivo->size_file,
                    'fechaSubida' => $archivo->fecha_subida,
                    'fechaEliminacion' => $archivoBorrado->fecha_borrado_temp,
                    'tipo' => $archivo->tipo_archivo,
                    'selected' => false
                ]);
            }
            return response()->json($archivosResp);
        }catch(Exception $e){
            Log::error($e->getMessage());
            return response()->json([
                'status' => 0,
                'mensaje' => 'Error desconocido'
            ], 500);
        }
    }

    private function getNombreCorto(string $nombre) : string{
        return strlen($nombre) >= 10? substr($nombre, 0, 10).'...' : $nombre;
    }

}
