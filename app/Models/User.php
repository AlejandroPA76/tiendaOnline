<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory,notifiable;

    public function comentarios(){
        //UN USUARIO puede HACER COMENTARIOS
    return $this->belongsTo('App\Models\comentario');
    }
    
     public function pedido(){
        //UN PRODUCTO PUEDE SER PEDIDO
    return $this->belongsTo('App\Models\pedido');
    }
    public function respuestas(){
        return $this->belongsTo('App\Models\Respuesta');
    }

    public function pagovendedor(){
        
        return $this->hasMany('App\Models\PagoVendedor');
    }
}
