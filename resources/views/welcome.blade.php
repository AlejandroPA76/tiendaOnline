@extends('layout')

@section('title', 'Mercado ITTG')

<style>
    a.boton {
        -webkit-appearance: button;
        -moz-appearance: button;
        appearance: button;
        background-color: #1e212d;
        border-style: solid;
        border-color: #1e212d;
        font-size: 25px;
        padding: 10px;
        border-radius: 15px;
        color: #f0f8ff;
        transition-duration: 0.4s;
        cursor: pointer;
        font-family: "Montserrat", sans-serif;
        margin-bottom: 10px;
    }
    
    a.boton:hover {
        background-color: #f0f8ff;
        color: #1e212d;
    }
    .pafuera {
        display: block;
        width: fit-content;
        margin-top: 15px;
        margin-right: auto;
        margin-left: auto;
    }
    img {
        width: 35%;
        height: max-content;
    }
</style>

@php
    $usuario = Auth::User();
@endphp

@section('navBar')
    <div class="menuBar">
        <h1>Mercado ITTG</h1>
        <ul>
            <li><a href="/categoria">Categorías</a></li>
            <li><a href="/productos">Productos</a></li>
            <li><a href="{{route('login')}}">Login</a></li>
           
            
        </ul>
    </div>
@endsection
    
@section('contenido')
    @if (session('mensaje'))
        <p class="info">{{ session('mensaje') }}</p>
    @endif
    @if (is_null($usuario) or $usuario->rol == 'Cliente')
        @isset($productos)
            <div class="catalogo">
                @foreach ($productos as $producto)
                    <div class="producto">
                        <img src="{{ url('storage/'.$producto->imagen) }}" alt="{{ $producto->nombre }}">
                        <div class="datosProducto">
                            <h1>{{ $producto->nombre }}</h1>
                            <p>{{ $producto->descripcion }}</p>
                            <p>${{ $producto->precio }} MXN C/U</p>
                            <a class="boton" href="/producto/{{ $producto->productoID }}">Ver producto</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endisset
    @elseif ($usuario->rol == 'Supervisor' or $usuario->rol == 'Revisor')
        @isset($productos)
            <div class="catalogo">
                @foreach ($productos as $producto)
                    <div class="producto">
                        <img src="{{ url('storage/'.$producto->imagen) }}" alt="{{ $producto->nombre }}">
                        <div class="datosProducto">
                            <h1>{{ $producto->nombre }}</h1>
                            <p>{{ $producto->descripcion }}</p>
                            <p>Precio</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endisset
    @endif
    

@endsection