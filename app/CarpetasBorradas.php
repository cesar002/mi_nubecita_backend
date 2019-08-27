<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarpetasBorradas extends Model{
    protected $primary_key = 'id_carpeta_borrada';
    public $timestamps = false;

    public function papelera(){
        return $this->belongsTo('App\Papeleras', 'id_papelera', 'id_carpeta_borrada');
    }
}
