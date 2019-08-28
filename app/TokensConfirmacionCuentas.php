<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TokensConfirmacionCuentas extends Model{
    protected $primary_key = 'id_token_confirmacion';
    public $timestamps = false;

    protected $fillable = [
        'token',
    ];


    public function usuariosAsociado(){
        return $this->hasMany('TokenConfirmacionCuentaAsociadoUsuarios', 'id_token');
    }

}
