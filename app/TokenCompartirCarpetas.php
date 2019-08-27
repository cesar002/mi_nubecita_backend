<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TokenCompartirCarpetas extends Model{
    protected $primary_key = 'id_token';
    public $timestamps = false;

    public function carpeta(){
        $this->belongsTo('App\CarpetasUsuarios', 'id_carpeta', 'id_token');
    }
}
