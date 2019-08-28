<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papeleras extends Model{
    protected $primary_key = 'id_papelera';
    public $timestamps = false;


    public function nube(){
        $this->belongsTo('App\NubesUsuarios', 'id_nube');
    }

    public function carpetasBorradas(){
        $this->hasMany('App\CarpetasBorradas', 'id_papelera');
    }

    public function archivosBorrados(){
        $this->hasMany('App\ArchivosBorrados', 'id_papelera');
    }

}