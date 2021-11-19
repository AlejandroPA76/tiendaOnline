<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    public function users(){
        //MUCHOS COMENTARIOS PUEDEN SER REALIZADOS POR UN USUARIO
        return $this->hasMany('App\Models\User');
    }

    public function productos(){
        //MUCHOS COMENTARIOS PUEDEN SER REALIZADOS A UN PRODUCTO
        return $this->hasMany('App\Models\Producto');
    }
}
