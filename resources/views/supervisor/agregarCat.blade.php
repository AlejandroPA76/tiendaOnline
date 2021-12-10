@extends('layouts.layouts')

@section('title')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        {{--se tiene que colocar un enctype porque vamos a colocar una imagen--}}
        {{--enctype="multipart/form-data"--}}
<form action="/categorias" method="POST" >
  @csrf

  <div class="form-group">
    <label for="">Nombre:</label>
    <input type="text" class="form-control" name="nombre">
  </div>

 
  <div class="form-group">
    <label for="">Descripcion:</label>
   <textarea class="form-control"rows="3" name="descripcion"></textarea>
  </div>
<br>

 {{--<div class="form-group">
    <label for="">Imagen:</label>
    <input type="file" name="imagen" id="uploadImage" size="30" /> 
  </div>

<br> --}}

  <div class="form-group">
    <label for="">Activa:</label>
    <input type="text" class="form-control" name="activa">
  </div>
<br>
  <button class="btn btn-primary" type="submit">Agregar</button>
  <a href="{{ url()->previous() }}" class="btn btn-danger" class="btn btn-danger">Cancelar</a>
</form>
</div>
</div>
</div>
@endsection
