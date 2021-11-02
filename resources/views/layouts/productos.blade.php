@extends('layouts.layouts')

@section('title','Bienvenido cliente')

@section('contenido')
  <div class="container">
  
  <div class="row">
    @foreach($cats as $cat)
    


    
    @endforeach
  </div>
     
</div>

@endsection

