<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    
     public function showcat(){
        $cats = Categoria::get();
        return view('cliente.index', compact('cats'));
    }
}
