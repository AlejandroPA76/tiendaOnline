<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    public function comentario(){
        //UN PRODUCTO PUEDE SER COMENTADO
    return $this->hasMany('App\Models\comentario');
    }

    public function user(){
        
    return $this->hasMany('App\Models\User');
    }
}
