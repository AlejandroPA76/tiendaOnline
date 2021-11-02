<!DOCTYPE html>
<html>
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

  <meta charset="utf-8">
  <title>@yield('title')</title>

</head>
<body>
<header>
  <div id="cont_nav">
                <nav id="nav_menu">
                  <ul>
                  @auth
                 
                  @if(auth()->user()->rol=="cliente")
                  <li><a href="#">carrito</a></li>
                  @endif

                  @if(auth()->user()->rol=="supervisor")
                  <li><a href='/categorias'>Categorias</a></li>
                  <li><a href="#">Productos</a></li>
                  <li><a href={{route('indexS')}}>home</a></li>
                  @endif

                  <li><a href="{{route('cerrar.usuario')}}">Logout</a></li>
                  @endauth

                  @guest
                  <li><a href="{{route('fregistro')}}">registrate</a></li>
                  <li><a href="{{route('login')}}">Login</a></li>
                  <li><a href="{{route('casa')}}">home</a></li>
                  @endguest

                  </ul>
                  
                </nav>
            </div>

  

  </header>
<section>
  @yield('contenido')
</section>
<footer>
  
</footer>
</body>
</html>