@extends('layouts.layouts')

@section('title','Perfil')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="login-form bg-light mt-4 p-4">

<form action="/usuario/{{$sl['id']}}/update" method="POST" class="row g-3">
    @csrf
    @method('PUT')
    <h4>Actualizar Contraseña</h4>
    <div class="col-12">
        <label>Contrasena</label>
         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
         @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

    </div>

    <div class="col-12">
        <label>Confirmar contrasena</label>
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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