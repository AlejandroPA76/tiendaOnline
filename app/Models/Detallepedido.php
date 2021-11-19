<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallepedido extends Model
{
    use HasFactory;

     public function pedidos(){
        //EL DETALLE DEL PRODUCTO PUEDE CONTENER VARIOS PRODUCTOS
        return $this->hasMany('App\Models\pedido');
    }
}
