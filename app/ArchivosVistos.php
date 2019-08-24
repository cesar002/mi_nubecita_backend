<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivosVistos extends Model{
    protected $primary_key = 'id_visto';
    public $timestamps = false;
}
