@extends('layouts.layouts')

@section('title')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        {{--se tiene que colocar un enctype porque vamos a colocar una imagen--}}
        {{--enctype="multipart/form-data"--}}

<form action="/categorias/{{$rCat->id}}" method="POST" >
  @csrf
   @method('put')
  <div class="form-group">
    <label for="">Nombre:</label>
    <input type="text" class="form-control" name="nombre" value="{{$rCat->nombre}}">
  </div>

 
  <div class="form-group">
    <label for="">Descripcion:</label>
   <textarea class="form-control"rows="3" name="descripcion">{{$rCat->descripcion}}</textarea>
  </div>
<br>

 <div class="form-group">
    <label for="">Imagen:</label>
    <input type="file" name="imagen" id="uploadImage" size="30" /> 
  </div>

<br>

  <div class="form-group">
    <label for="">Activa:</label>
    <input type="text" class="form-control" name="activa" value="{{$rCat->activa}}">
  </div>
<br>
  <button class="btn btn-primary" type="submit">Actualizar</button>
  <a href="{{ url()->previous() }}"  class="btn btn-danger">Cancelar</a>
</form>
</div>
</div>
</div>
@endsection
