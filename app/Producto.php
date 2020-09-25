<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $primaryKey = 'idProducto';

    public $timestamps = false;

    

    //Relacion con otras tablas

    public function relMarca(){

    	return $this->belongsTo('\App\Marca','idMarca','idMarca');//Model con el que hago la relacion, foreign key, owner key
    }


    public function relCategoria(){

    	return $this->belongsTo('\App\Categoria','idCategoria','idCategoria');//Model con el que hago la relacion, foreign key, owner key
    }




}
