<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TokenRecuperacionPassword extends Model
{
    protected $table = 'token_recuperacion_password';
    public $timestamps = false;


    public function usuario(){
        return $this->belongsTo('App\User', 'id_usuario');
    }

}
