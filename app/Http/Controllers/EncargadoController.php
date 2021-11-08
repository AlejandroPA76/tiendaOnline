<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use DB;

class EncargadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
        $this->middleware('auth');
        $this->middleware('encargado',['only'=> ['index']]);
    }
    public function index()
    {
        $cats = Categoria::get();
        //return view('supervisor.crudCategoria',compact('cats'));
        return view('encargado.index',$cats);
    }

    public function Menucats(){
        //$pds = Producto::consignar()->get();
        $cts = Categoria::all();    
        return view('encargado.productos.pendienteAutorizar',compact('cts'));

       
    }

    public function listarProducto($id){
        //$prods = DB::table('productos')->where('categoria_id',$id)->get();
        $prods = DB::table('productos')->where('categoria_id',$id)->get();
        return view('encargado.productos.listarProductos',compact('prods'));

    }
}
