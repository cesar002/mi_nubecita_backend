<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TokenConfirmacionCuentaAsociadoUsuarios extends Model{
    public $timestamps = false;

    public function usuario(){
        return $this->belongsTo('App\User', 'id_usuario');
    }

    public function tokenConfirmacion(){
        return $this->belongsTo('App\TokensConfirmacionCuentas', 'id_token');
    }
}
