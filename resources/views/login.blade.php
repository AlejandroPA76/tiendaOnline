<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login!</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form action="{{route('autenticar.usuario')}}" method="POST" class="row g-3">
                        @csrf
                        <h4>Iniciar sesión</h4>
                        <div class="col-12">
                            <label>Ingresa tu email:</label>
                            <input type="email" name="email" class="form-control" placeholder="correo">
                        </div>
                        <div class="col-12">
                            <label>Ingresa tu contrasena:</label>
                            <input type="password" name="password" class="form-control" placeholder="constrasena">
                        </div>
            
                        <div class="col-12">
                <button type="submit" class="btn btn-dark float-end">{{ __('Login') }}</button>
                        </div>
                    </form>
                    <hr class="mt-4">
                    <div class="col-12">
                        <p class="text-center mb-0">Eres nuevo? <a href="#">registrate</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>