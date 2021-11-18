@extends('layouts.layouts')

@section('title','Bienvenido cliente')

@section('contenido')
  <div class="container">
  @section('buscar')
    <input type="text" class="form-control" placeholder="Buscar" name="search" value="{{$search1}}">

  @endsection


  <div class="row">
    @foreach($Productos as $pro)
    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
      <div class="card">
        
        <img class="card-img-top" src="https://i1.wp.com/ikerbit.com/wp-content/uploads/2021/04/laravel.jpeg?fit=1200%2C630&ssl=1" alt="Bologna">
        <div class="card-body">
          <h4 class="card-title">{{$pro->nombre}}</h4>
          <p class="card-text">{{$pro->descripcion}}</p>
          <a href="/Showproducto/{{$pro->id}}" class="card-link">entrar</a>
     
        </div>
        
      </div>
     
    </div>
    @endforeach
  </div>
     
</div>

@endsection

