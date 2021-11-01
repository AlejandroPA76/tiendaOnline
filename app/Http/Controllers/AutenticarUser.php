<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        
            return redirect()->route('show.cats');
    }
    return 'datos erroneos';
    
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function register(Request $request){
        $r = new User;
        $r->name = $request->input('name');
        $r->apellido_p = $request->input('ApellidoP');
        $r->apellido_m = $request->input('ApellidoM');
        $r->email = $request->input('email');
        $r->password = Hash::make($request->input('password'));
        $r->rol = $request->input('rol');
        $r->save();
        return redirect('cliente/index');
    }
}
