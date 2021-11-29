<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
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
    public function index1()
    {
        $cats = Categoria::get();
        //return view('supervisor.crudCategoria',compact('cats'));
        return view('encargado.index',$cats);
    }

    public function Menucats(){
        //$pds = Producto::consignar()->get();
        $cts = Categoria::all();
        $id = auth::user()->id;   
        return view('encargado.productos.pendienteAutorizar',compact('cts','id'));

       
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

    public function index()
    {
        $usrs = User::where('rol', 'encargado')
                    ->orwhere('rol','cliente')
                    ->orwhere('rol','vendedor')
                    ->orwhere('rol','contador')
                    ->get();
        return view('encargado.usuario.index',compact('usrs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('encargado.usuario.altaUsuario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $r = new User;
        $r->name = $request->input('name');
        $r->apellido_p = $request->input('ApellidoP');
        $r->apellido_m = $request->input('ApellidoM');
        $r->email = $request->input('email');
        $r->password = Hash::make($request->input('password'));
        $r->rol = $request->input('rol');
        $r->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $us = User::find($id);
        $id = $us->id;

        return view('encargado.usuario.indexEdit',compact('us','id'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sl = User::find($id);
        $id = $sl->id;
        return view('encargado.usuario.infoEditar',compact('sl','id'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $us = User::find($id);
        $us->name = $request->input('name');
        $us->apellido_p = $request->input('ApellidoP');
        $us->apellido_m = $request->input('ApellidoM');
        $us->email = $request->input('email');
        $us->save();
        
        return redirect('encargados/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
