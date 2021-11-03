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
            <a href="/usuarios/{{$id}}/edit" class="btn btn-primary">Editar Informacion</a>
            <a href="/usuario/{{$id}}/updatePassword" class="btn btn-primary">Cambiar Contraseña</a>
          </div>
      </div>

      
      
</div>
@endsection
