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
        $prods = DB::table('productos')->where('categoria_id',$id)->where('consignar','pendiente')->get();
        return view('encargado.productos.listarProductos',compact('prods'));

    }

    public function decisionProducto($id){
         $sl = Producto::find($id);
        return view('encargado.productos.autorizar',compact('sl'));
    }

    public function aceptarProducto(Request $request,$id){
        $sl = Producto::find($id);
        $sl->consignar=$request->input('consignar');
        $sl->porcentaje=$request->input('porcentaje');
        $sl->save();
        return redirect()->route('listar.categoria.autorizar');
    }
    public function rechazarProducto(Request $request,$id){
        $sl = Producto::find($id);
        $sl->consignar=$request->input('consignar');
        $sl->motivo=$request->input('motivo');
        $sl->save();
        return redirect()->route('listar.categoria.autorizar');
    }
}
