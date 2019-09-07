<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivosBorrados extends Model{
    protected $primary_key = 'id_archivo_borrado';
    protected $primaryKey = 'id_archivo_borrado';

    public $timestamps = false;

    protected $fillable = [
        'id_papelera', 'id_archivo', 'fecha_borrado_def', 'borrado_def', 'activo',
    ];

    public function papelera(){
        return $this->belongsTo(Papeleras::class, 'id_papelera', 'id_archivid_archivo_borradoo_borrado');
    }


}
