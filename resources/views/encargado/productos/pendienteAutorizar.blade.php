@extends('layouts.layouts')

@section('title')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                        <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Selecciona la categoria</a>
                        <div class="dropdown-menu">
                            @foreach($cts as $ct)
                            <a href="{{route('listar.producto.autorizar',$ct->id)}}" class="dropdown-item">{{$ct->nombre}}</a>
                            @endforeach
                        </div>
                    </div>
                    
                </div>

                
                  
                    @yield('productos')
               
            </div>
        </div>
    </div>
</div>

@endsection