<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function productos(){
        //MUCHOS COMENTARIOS PUEDEN SER REALIZADOS A UN PRODUCTO
        return $this->hasMany('App\Models\Producto');
    }

     public function users(){
        //MUCHOS COMENTARIOS PUEDEN SER REALIZADOS POR UN USUARIO
        return $this->hasMany('App\Models\User');
    }

     public function pedidos(){
        //UN PEDIDO PUEDE PERTENERCER A UN DETALLE O VARIOS
        return $this->belongsTo('App\Models\Detallepedido');
    }

}
