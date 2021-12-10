<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function productos(){
        
        return $this->hasMany('App\Models\Producto');
    }

     public function users(){
        
        return $this->hasMany('App\Models\User');
    }

     public function pedidos(){
        //UN PEDIDO PUEDE PERTENERCER A UN DETALLE O VARIOS
        return $this->belongsTo('App\Models\Detallepedido');
    }

}
