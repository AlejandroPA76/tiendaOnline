<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;


    //un producto pertenece a una categoria
    public function categoria(){
        return $this->belongsTo('App\Models\categoria');
    }

    public function scopeConsignar($query){
        return $query->where('consignar','pendiente');
    }

    
}
