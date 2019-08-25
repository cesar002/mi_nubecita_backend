<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LimitesAlmacenaje extends Model{
    protected $table = 'limites_almacenaje';
    protected $primary_key  = 'id_limite';
    public $timestamps = false;
}
