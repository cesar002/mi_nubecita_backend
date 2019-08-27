<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TokenCompartirArchivos extends Model{
    protected $primary_key = 'id_archivo';
    public $timestamps = false;

    public function archivo(){
        return $this->belongsTo('App\ArchivosSubidos', 'id_archivo', 'id_archivo');
    }
}
