<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccionesController extends Controller
{
    //
    public function showProducto($id){

        $sl  = Producto::find($id);
        if(!Auth::check()){
            $id = 0;
        return view('cliente.acciones.mostrarProducto',compact('sl','id'));
        }else{
            $id = auth::user()->id;
        return view('cliente.acciones.mostrarProducto',compact('sl','id'));
        }        
    
    }
}
