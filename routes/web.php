<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticarUser;
use App\Http\Controllers\CategoriaController;

use App\Http\Controllers\ProductoController;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\EncargadoController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\AccionesController;
use App\Http\Controllers\MultimedioController;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
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
    if(!Auth::check()){
        $id = 0;
        return view('cliente.index', compact('cats','id'));    
    }else{
        $id = auth::user()->id;
        return view('cliente.index', compact('cats','id'));
    }
    
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


Route::get('/index/contador',function(){
return view('contador.index');
})->name('indexCo');
///////////////////////////////////////////////////////////////////////////

//////////////todo lo que tenga que ver con el usuario
Route::post('/usuario',[AutenticarUser::class,'validar'])->name('autenticar.usuario');
Route::get('logout',[AutenticarUser::class,'logout'])->name('cerrar.usuario');
Route::get('usuario/{id}/updatePassword',[AutenticarUser::class,'updatePassword'])->name('updatePassword');
Route::put('usuario/{id}/update',[AutenticarUser::class,'update'])->name('update');


////////////////////////////////////

///menu respectivo de cada rol
Route::get('/contador',[ContadorController::class,'index'])->name('contador.index');
Route::get('/encargado',[EncargadoController::class,'index1'])->name('encargado.index');
Route::get('/supervisor',[SupervisorController::class,'index'])->name('supervisor.index');
//////////////////////////////////////////////////////////////////////////////////

/////crud categorias y productos

Route::resource('categorias',CategoriaController::class);

//////
Route::resource('productos',ProductoController::class);
Route::resource('usuarios',UsuarioController::class);
Route::resource('encargados',EncargadoController::class);
////con esto veo el id de la categoria que se va a presionar

///ruta autorizar producto
Route::get('/encargado/autorizacion-listado',[EncargadoController::class,'Menucats'])->name('listar.categoria.autorizar');
//ver y autorizar el producto en especifico

Route::get('encargado/listar-producto-categoria/{id}',[EncargadoController::class,'listarProducto'])->name('listar.producto.autorizar');
Route::get('encargado/visualizar-producto/{id}',[EncargadoController::class,'decisionProducto'])->name('autorizar.producto');
Route::put('encargado/autorizar-producto/{id}',[EncargadoController::class,'aceptarProducto'])->name('aceptar.producto');
Route::put('encargado/rechazar-producto/{id}',[EncargadoController::class,'rechazarProducto'])->name('rechazar.producto');

//ruta donde se elimina imagenes de cada producto
Route::delete('imagen/{id}',[MultimedioController::class,'eliminarmultimedio'])
->name('eliminar.imagen.producto');

//rutas de las acciones de los clientes
Route::post('/addComentary',[AccionesController::class,'addCommentary'])->name('addComentary');
Route::delete('/deleteCommentary/{id}',[AccionesController::class,'deleteCommentary'])->name('deleteCommentary'); 
Route::post('/addResponse/{id}',[AccionesController::class,'addResponse'])->name('addResponse');
Route::delete('/deleteResponse/{id}',[AccionesController::class,'deleteResponse'])->name('deleteResponse'); 
Route::get('Showproducto/{id}',[AccionesController::class,'showProducto']);

////
Route::put('cliente/contrato{id}',[AccionesController::class,'clienteVendedor'])->name('contratoVendedor');