<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticarUser;
use App\Http\Controllers\CategoriaController;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\EncargadoController;
use App\Http\Controllers\SupervisorController;
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

Route::get('/register',function(){
return view('register');
})->name('fregistro');

Route::post('usuario/alta',[AutenticarUser::class,'register'])->name('registrar');


Route::get('cliente/index',[CategoriaController::class,'showcat'])->name('show.cats');

Route::get('/cliente',[ClienteController::class,'index'])->name('cliente.index');
Route::get('/contador',[ContadorController::class,'index'])->name('contador.index');
Route::get('/encargado',[EncargadoController::class,'index'])->name('encargado.index');
Route::get('/supervisor',[SupervisorController::class,'index'])->name('supervisor.index');