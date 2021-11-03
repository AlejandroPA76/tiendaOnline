@extends('layouts.layouts')

@section('title','Perfil')

@section('contenido')

<div class="col-12 col-sm-8 col-md-6 col-lg-4">
    <div class="card">
      
      <h2>Mi Perfil</h2>
      <div class="card-body">
        <h4 class="card-title">{{$us->name}}</h4>
        <h4 class="card-text">{{$us->apellido_p}}</h4>
        <h4 class="card-text">{{$us->apellido_m}}</h4>
        <h4 class="card-text">{{$us->email}}</h4>

        <div>
            <button class="btn btn-primary" type="submit">Editar Informacion</button>
            <button class="btn btn-primary" type="submit">Cambiar Contraseña</button>
        </div>
      </div>

      
      
</div>
@endsection
