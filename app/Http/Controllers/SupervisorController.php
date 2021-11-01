<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

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
        return view('encargado.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
