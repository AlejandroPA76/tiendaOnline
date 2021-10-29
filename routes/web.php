<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticarUser;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('validar', 'AutenticarController@validar');
Route::get('salir', 'AutenticarController@salir');

Route::get('supervisor', function() {
    return view('supervisor');
})->middleware('auth');

Route::get('encargado' ,function() {
    return view('encargado');
});

Route::get('cliente', function() {
    $categorias = Categoria::all();
    $usuario = Auth::User();
    return view('cliente', compact('categorias', 'usuario'));
});

Route::get('usuarios', 'UsuarioController@index');


Route::get('/index/supervisor',function(){
return view('supervisor.index');
})->name('indexS');

Route::get('/index/contador',function(){
return view('contador.index');
})->name('indexCo');


Route::get('/index/cliente',function(){
return view('cliente.index');
})->middleware('auth')->name('indexCli');


Route::post('/autenticar/usuario',[AutenticarUser::class,'validar'])->name('autenticar.usuario');

Route::get('logout',[AutenticarUser::class,'logout'])->name('cerrar.usuario');
