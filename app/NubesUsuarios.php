<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NubesUsuarios extends Model{
    protected $primary_key = 'id_nube';
    public $timestamps = false;

    public function usuario(){
        return $this->belongsTo('App\User', 'id_usuario', 'id_nube');
    }

    public function carpetas(){
        return $this->hasMany('App\CarpetasUsuarios', 'id_nube', 'id_nube');
    }

    public function papelera(){
        return $this->hasOne('App\Papeleras', 'id_nube', 'id_nube');
    }

}
