<?php

use Illuminate\Support\Facades\Route;

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
});

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