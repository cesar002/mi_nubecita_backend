<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TokensConfirmacionCuentas extends Model{
    protected $primary_key = 'id_token_confirmacion';
    protected $primaryKey = 'id_token_confirmacion';

    public $timestamps = false;

    protected $fillable = [
        'token',
    ];


    public function usuariosAsociados(){
        return $this->hasMany('App\TokenConfirmacionCuentaAsociadoUsuarios', 'id_token', 'id_token_confirmacion');
    }

}
