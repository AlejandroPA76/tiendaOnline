<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multimedio extends Model
{
    use HasFactory;

    public function productos(){
        //MUCHOS COMENTARIOS PUEDEN SER REALIZADOS POR UN USUARIO
        return $this->hasMany('App\Models\Productos');
    }

}
