<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //solo para el administrador
        $cats = Categoria::orderBy('created_at','desc')->get();
        $id = auth::user()->id;
        return view('cliente.index', compact('cats','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        //
        $us = User::find($id);
        return view('cliente.perfil.index',compact('us','id'));
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
        
        $sl = User::find($id);
        $id = auth::user()->id;
        return view('cliente.perfil.perfilEditar',compact('sl','id'));
        
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
        

        $us = User::find($id);
        $us->name = $request->input('name');
        $us->apellido_p = $request->input('ApellidoP');
        $us->apellido_m = $request->input('ApellidoM');
        $us->email = $request->input('email');
        $us->save();
        
        return redirect('usuarios/'.$id);
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
