<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivosSubidos extends Model{
    protected $primary_key = 'id_archivo';
    protected $primaryKey = 'id_archivo';

    public $timestamps = false;

    public function carpeta(){
        return $this->belongsTo('App\CarpetasUsuarios', 'id_carpeta', 'id_archivo');
    }

    public function tokensCompartir(){
        return $this->hasMany('App\TokenCompartirArchivos', 'id_archivo', 'id_archivo');
    }

    public function favoritos(){
        return $this->hasMany('App\ArchivosFavoritos', 'id_archivo', 'id_archivo');
    }

    public function vistos(){
        return $this->hasMany('App\ArchivosVistos', 'id_archivo', 'id_archivo');
    }
}
