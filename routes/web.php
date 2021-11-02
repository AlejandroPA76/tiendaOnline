<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticarUser;
use App\Http\Controllers\CategoriaController;

use App\Http\Controllers\ProductoController;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\EncargadoController;
use App\Http\Controllers\SupervisorController;
use App\Models\Categoria;
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
//home de todos
Route::get('/', function () {
    $cats = Categoria::orderBy('created_at','desc')->get();
    return view('cliente.index', compact('cats'));
    
})->name('casa');
//////////////////////////////////
//menu login y registrar
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register',function(){
return view('register');
})->name('fregistro');

////////////////////////////////////
//menu de empleados
Route::get('/index/supervisor',function(){
return view('supervisor.index');
})->name('indexS');

Route::get('encargado' ,function() {
    return view('encargado');
});

Route::get('/index/contador',function(){
return view('contador.index');
})->name('indexCo');
///////////////////////////////////////////////////////////////////////////

//////////////todo lo que tenga que ver con el usuario
Route::post('/usuario',[AutenticarUser::class,'validar'])->name('autenticar.usuario');

Route::get('logout',[AutenticarUser::class,'logout'])->name('cerrar.usuario');

Route::post('usuario/alta',[AutenticarUser::class,'register'])->name('registrar');

////////////////////////////////////
///menu respectivo de cada rol
Route::get('/contador',[ContadorController::class,'index'])->name('contador.index');
Route::get('/encargado',[EncargadoController::class,'index'])->name('encargado.index');

Route::get('/supervisor',[SupervisorController::class,'index'])->name('supervisor.index');
//////////////////////////////////////////////////////////////////////////////////
/////crud categorias y productos
Route::resource('categorias',CategoriaController::class);

Route::resource('productos',ProductoController::class);
////con esto veo el id de la categoria que se va a presionar
