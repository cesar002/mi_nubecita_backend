<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivosVistos extends Model{
    protected $primary_key = 'id_visto';
    protected $primaryKey = 'id_visto';

    public $timestamps = false;

    public function archivo(){
        return $this->belongsTo('App\ArchivosSubidos', 'id_archivo', 'id_visto');
    }
}
