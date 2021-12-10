<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Categoria;

class AutenticarUser extends Controller
{
     public function validar()
    {
    $credenciales = request()->only('email','password');
    
    if(Auth::attempt($credenciales) && auth::user()->rol=="supervisor"){
        request()->session()->regenerate();
            return view('supervisor.index'); 
    }

    if(Auth::attempt($credenciales) && auth::user()->rol=="contador"){
        request()->session()->regenerate();
            return view('contador.index');
    }

    if(Auth::attempt($credenciales) && auth::user()->rol=="cliente"){
        $cats = Categoria::orderBy('created_at','desc')->get();
        return redirect('/usuarios');
        
    }

    if(Auth::attempt($credenciales) && auth::user()->rol=="encargado"){
        
        return view('encargado.index');
        
    }
     if(Auth::attempt($credenciales) && auth::user()->rol=="vendedor"){
        $id =  auth::user()->id;
        return view('vendedor.index',compact('id'));
        
    }
    
    return 'datos erroneos';
    
    }

    public function updatePassword($id){

        if(auth::user()->rol == 'encargado'){
            $sl = User::find($id);
            return view('cliente.perfil.ContraEditar',compact('sl','id'));
        }else{
            if($id != auth::user()->id){
                return redirect('usuario/'.auth::user()->id.'/updatePassword');
            }else{
            $sl = User::find($id);
            $id = auth::user()->id;
            return view('cliente.perfil.ContraEditar',compact('sl','id'));
            }
        }

    }

    public function update(Request $request, $id){
        $us = User::find($id);
        $us->password = Hash::make($request->input('password'));
        $us->save();
        return redirect('/');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }


}
