<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LimitesAlmacenaje extends Model{
    protected $table = 'limites_almacenaje';
    protected $primary_key  = 'id_limite';
    protected $primaryKey = 'id_limite';

    public $timestamps = false;


    public function usuario(){
        return $this->belongsTo('App\users', 'id_limite', 'id_limite');
    }

}
