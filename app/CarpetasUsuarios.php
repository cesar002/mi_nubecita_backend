<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarpetasUsuarios extends Model{
    protected $primary_key = 'id_carpeta';
    public $timestamps = false;


    public function nube(){
        return $this->belongsTo('App\NubesUsuarios', 'id_nube');
    }

    public function tokensCompartir(){
        return $this->hasMany('App\TokenCompartirCarpetas', 'id_carpeta');
    }

    public function archivos(){
        return $this->hasMany('App\ArchivosSubidos', 'id_carpeta');
    }

}
