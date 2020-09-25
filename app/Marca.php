<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    //primary key
    protected $primaryKey = 'idMarca';
    //created_at & updated_at
    public $timestamps = false;
}
