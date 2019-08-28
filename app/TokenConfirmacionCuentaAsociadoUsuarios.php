<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TokenConfirmacionCuentaAsociadoUsuarios extends Model{
    public $timestamps = false;

    protected $fillable = [
        'id_usuario', 'id_token', 'fecha_limite'
    ];

    public function usuario(){
        return $this->belongsTo('App\User', 'id_usuario');
    }

    public function tokenConfirmacion(){
        return $this->belongsTo('App\TokensConfirmacionCuentas', 'id_token');
    }
}
