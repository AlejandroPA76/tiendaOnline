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

    public function comentario(){
        //UN PRODUCTO PUEDE SER COMENTADO
    return $this->belongsTo('App\Models\comentario');
    }

    public function pedido(){
        //UN PRODUCTO PUEDE SER PEDIDO
    return $this->belongsTo('App\Models\pedido');
    }
    
    public function multimedio(){
        //UN PRODUCTO PUEDE TENER VARIAS FOTOS
    return $this->belongsTo('App\Models\multimedio');
    }
}
