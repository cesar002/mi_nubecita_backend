<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivosBorrados extends Model{
    protected $primary_key = 'id_archivo_borrado';
    public $timestamps = false;

    public function papelera(){
        return $this->belongsTo('App\Papeleras', 'id_papelera', 'id_archivo_borrado');
    }

}
