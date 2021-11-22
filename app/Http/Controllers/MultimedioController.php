<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multimedio;

use Illuminate\Support\Facades\Storage;

class MultimedioController extends Controller
{
    //esta funcion sirve para eliminar una imagen de cada productos SOLO LA  IMAGEN DE UN PRODUCTO O VARIAS IMAGENES DEL MISMO PRODUCTO
   public function eliminarmultimedio($id){
    //return $id;
    $photos = Multimedio::findOrFail($id);
    $photos->delete();
     Storage::delete('public/'.$photos->foto);
   }
}
