<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Multimedio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccionesController extends Controller
{
    //
    public function showProducto($id){

        $sl  = Producto::find($id);
        $photos = Multimedio::where('productos_id',$sl->id)->get();
        if(!Auth::check()){
            $id = 0;
        return view('cliente.acciones.mostrarProducto',compact('sl','id','photos'));
        }else{
            $id = auth::user()->id;
        return view('cliente.acciones.mostrarProducto',compact('sl','id','photos'));
        }        
    
    }
}
