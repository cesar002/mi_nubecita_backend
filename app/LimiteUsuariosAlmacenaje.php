<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LimiteUsuariosAlmacenaje extends Model{
    protected $table = 'limite_usuarios_almacenaje';
    public $timestamps = false;

    public function usuario(){
        return $this->belongsTo('App\User', 'id_usuario');
    }

    public function limites(){
        return $this->belongsTo('LimitesAlmacenaje', 'id_limite');
    }

}