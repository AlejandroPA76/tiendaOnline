<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

//una categoria tiene muchos productos
    public function productos(){
        return $this->hasMany('App\Models\Producto');
    }



   
}
