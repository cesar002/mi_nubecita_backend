<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivosFavoritos extends Model{
    protected $primary_key = 'id_favorito';
    protected $primaryKey = 'id_favorito';

    public $timestamps = false;

    public function usuario(){
        return $this->belongsTo('App\Users', 'id_usuario', 'id_favorito');
    }

    public function archivo(){
        return $this->belongsTo('App\ArchivosSubidos', 'id_archivo', 'id_favorito');
    }
}
