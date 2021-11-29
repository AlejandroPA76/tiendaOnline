<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
        $this->middleware('auth');
        $this->middleware('supervisor',['only'=> ['index']]);
    }

    public function crudCat(){
        $cats = Categoria::orderBy('created_at','desc')->get();
        return view('supervisor.crudCategoria',compact('cats'));
    }

    public function addCat(){
        return view('supervisor.agregarCat');
    }

    public function almacenar(Request $request){
       
        $newcat = new Categoria;
        $newcat->nombre = $request->input('nombre');
        $newcat->descripcion = $request->input('descripcion');
        $newcat->imagen = $request->input('imagen');
        $newcat->activa = $request->input('activa');
        $newcat->save();
    }

    public function index()
    {
        $usrs = User::all();
        return view('supervisor.usuario.index',compact('usrs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('supervisor.usuario.altaUsuario');
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
        return view('supervisor.usuario.indexEdit',compact('us','id'));
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
        return view('supervisor.usuario.infoEditar',compact('sl','id'));   
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
        
        return redirect('supervisor/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $delus=User::find($id);
       $delus->delete();
    return redirect('/');
    }
}
