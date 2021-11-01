<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    
     public function showcat(){
        $cats = Categoria::orderBy('created_at','desc')->get();
        return view('cliente.index', compact('cats'));
    }
}
