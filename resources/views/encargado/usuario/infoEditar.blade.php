@extends('layouts.layouts')

@section('title','Perfil')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="login-form bg-light mt-4 p-4">

<form action="/encargado/{{$sl['id']}}" method="POST" class="row g-3">
    @csrf
    @method('PUT')
    <h4>Actualizar Informacion</h4>
    <div class="col-12">
        <label>Nombre</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $sl['name'] }}" required autocomplete="name" autofocus>
        @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

     <div class="col-12">
        <label>Apellido Paterno</label>
        <input id="ApellidoP" type="text" class="form-control @error('AP') is-invalid @enderror" name="ApellidoP" value="{{$sl['apellido_p']}}" required autocomplete="AP" autofocus>
        @error('AP')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

     <div class="col-12">
        <label>Apellido Materno</label>
        <input id="ApellidoM" type="text" class="form-control @error('AM') is-invalid @enderror" name="ApellidoM" value="{{ $sl['apellido_m'] }}" required autocomplete="AM" autofocus>
        @error('AP')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

    <div class="col-12">
        <label>Email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $sl['email'] }}" required autocomplete="email">
        @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-dark float-end" value="info">Actualizar</button>
                
    </div>
</form> 


            </div>
        </div>
    </div>
</div>
@endsection