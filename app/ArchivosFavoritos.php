<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivosFavoritos extends Model{
    protected $primary_key = 'id_favorito';
    public $timestamps = false;

    public function usuario(){
        return $this->belongsTo('App\Users', 'id_usuario');
    }

    public function archivo(){
        return $this->belongsTo('', '');
    }
}
