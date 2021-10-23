<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AutenticarUser extends Controller
{
     public function validar()
    {
    $credenciales = request()->only('email','password','rol');
    
    if(Auth::attempt($credenciales)&& auth::user()->rol=="supervisor"){
        request()->session()->regenerate();
            return view('supervisor.index'); 
    }

    if(Auth::attempt($credenciales) && auth::user()->rol=="contador"){
        request()->session()->regenerate();
            return view('contador.index');
    }

    if(Auth::attempt($credenciales) && auth::user()->rol=="cliente"){
        request()->session()->regenerate();
            return view('cliente.index');
    }
    return 'datos erroneos';
    
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
