<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LimitesAlmacenaje extends Model{
    protected $table = 'limites_almacenaje';
    protected $primary_key  = 'id_limite';
    public $timestamps = false;


    public function usuariosAsociados(){
        return $this->hasMany('LimiteUsuariosAlmacenaje', 'id_limite', 'id_limite');
    }

}
