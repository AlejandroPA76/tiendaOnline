@extends('layouts.layouts')

@section('title','Bienvenido cliente')

@section('contenido')

  <div class="container">
   
  <div class="row">
    @foreach($cats as $cat)
    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
      <div class="card">
        
        <img class="card-img-top" src="https://i1.wp.com/ikerbit.com/wp-content/uploads/2021/04/laravel.jpeg?fit=1200%2C630&ssl=1" alt="Bologna">
        <div class="card-body">
          <h4 class="card-title">{{$cat->nombre}}</h4>
          <p class="card-text">{{$cat->descripcion}}</p>
          
          @if($cat->activa=='si')
          <a href="/productos/{{$cat->id}}" class="card-link">entrar</a>
         @endif
        </div>
        
      </div>
     
    </div>
    @endforeach
  </div>
     
</div>

@endsection

