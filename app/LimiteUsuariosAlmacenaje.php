<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LimiteUsuariosAlmacenaje extends Model{
    protected $table = 'limite_usuarios_almacenaje';
    public $timestamps = false;

    public function usuario(){
        return $this->belongsTo('App\User', 'id_usuario', 'limite_usuarios_almacenaje');
    }

    public function limites(){
        return $this->belongsTo('LimitesAlmacenaje', 'id_limite', 'limite_usuarios_almacenaje');
    }

}
