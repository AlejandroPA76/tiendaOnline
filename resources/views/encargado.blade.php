@extends('layout')

@section('title', 'Revisor')

@section('navBar')
    <div class="menuBar">
        <h1>AplicacionMercado.com</h1>
    </div>
@endsection

@section('contenido')
    <div id="opcionesSupervisor">
        <a href="/categoria"><button id="botonInverso">Categorías</button></a>
        <a href="/productos"><button id="botonInverso">Productos</button></a>
    </div>
    <a href="/salir"><button id="botonInverso" class="pafuera">Salir pa fuera</button></a>
@endsection