<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papeleras extends Model{
    protected $primary_key = 'id_papelera';
    protected $primaryKey = 'id_papelera';

    public $timestamps = false;


    public function nube(){
        $this->belongsTo('App\NubesUsuarios', 'id_nube', 'id_papelera');
    }

    public function carpetasBorradas(){
        $this->hasMany('App\CarpetasBorradas', 'id_papelera', 'id_papelera');
    }

    public function archivosBorrados(){
        $this->hasMany(ArchivosBorrados::class, 'id_papelera', 'id_papelera');
    }

}
