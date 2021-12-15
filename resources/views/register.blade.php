@extends('layouts.layouts')

@section('title','Registrate es gratis!')

@section('contenido')
{{--libreria de ajax--}}
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form action="/usuarios" method="post" class="row g-3" id="form1">
                        @csrf
                        <h4>Registrate</h4>
                        <div class="col-12">
                            <label>Nombre</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                         <div class="col-12">
                            <label>Apellido Paterno</label>
                            <input id="ApellidoP" type="text" class="form-control @error('AP') is-invalid @enderror" name="ApellidoP" value="{{ old('AP') }}" required autocomplete="AP" autofocus>
                            @error('AP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                         <div class="col-12">
                            <label>Apellido Materno</label>
                            <input id="ApellidoM" type="text" class="form-control @error('AM') is-invalid @enderror" name="ApellidoM" value="{{ old('AM') }}" required autocomplete="AM" autofocus>
                            @error('AP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-12">

                            <label>Email</label>
                            <input id="email" type="email" class="form-control 
                            @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                            onblur="myFunction()">
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            
                        </div>
            <div id="alerta"></div>

                        <div class="col-12">
                            <label>Contrasenaaa</label>
                             <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                             @error('password')
                                    <span class="invalid-feedback" role="alert" role="alert" style="display:none;" >
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="col-12">
                            <label>Confirmar contrasena</label>
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="col-12">
    <button type="submit" class="btn btn-dark float-end">{{('Register')}}</button>
    <a href="{{route('login')}}"></a>
                        </div>

                          <div class="col-12">
                              <input type="hidden" class="form-control"  name="rol" value="cliente">
                        </div>
                    </form>
                    <hr class="mt-4">
                   
                </div>
            </div>
        </div>
    </div>

    
@endsection

<script type="text/javascript">
function myFunction() {
  var x = document.getElementById("email").value;
  
  if(x !=0){
//datos iran a el controlador AccionesController
   $.ajax({
    method:'post',
    url:'{{route('validaCorreo')}}',
    data:$("#form1").serialize()
   }).done(function(res){
   
     alert(res);
    

   })

  }
 
}

</script>

    





    

