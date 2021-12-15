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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="m-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav">
                  @guest
                  <a href="/" class="navbar-brand">Bienvenido</a>
                  <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                    <li><a href="{{route('login')}}" class="nav-item nav-link active">Login</a></li>
                    <li><a href="/usuarios/create" class="nav-item nav-link active">Registrate</a></li>
                  @endguest
                   
                  @auth
                  <a href="/usuarios" class="navbar-brand">Bienvenido
                   {{auth()->user()->name}} 
                </a>
                
               
                  <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                      <span class="navbar-toggler-icon"></span>
                  </button>                 
                    @if(auth()->user()->rol=="cliente")
                      <li><a href="/usuarios/{{$id}}" class="nav-item nav-link active">Mi Perfil</a></li>
                      <li><a href="/showPedido/{{$id}}" class="nav-item nav-link active">Carrito</a></li>
                      <li><a href="/showDetallesPedido/{{Auth::user()->id}}" class="nav-item nav-link active">Mis Compras</a></li>
<!-- Button trigger modal -->

<li><a href="" class="nav-item nav-link active" data-bs-toggle="modal" data-bs-target="#exampleModal">Convertirme en vendedor</a></li>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AVISO!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Al convertirte en vendedor podras poner a la ventas tus productos y ganar muchos beneficios!. <br>
        Al presionar el boton azul estas aceptando ser un vendedor.
      </div>
      <div class="modal-footer">
        <form action="{{route('contratoVendedor',$id)}}" method="POST">
            @csrf
            @method('put')
            <input type="hidden" name="rol" value="vendedor">
            <button type="submit" class="btn btn-primary">Convertirme en vendedor</button>
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>

                    @endif



                    @if(auth()->user()->rol=="supervisor")
                      <li><a href='/categorias' class="nav-item nav-link active">Categorias</a></li>
                      <li><a href="/supervisor" class="nav-item nav-link active">Usuarios</a></li>
                    @endif

                    @if(auth()->user()->rol=="encargado")
                      {{--<li><a href='/categorias' class="nav-item nav-link active">Categorias</a></li>--}}

                      <li><a href="/encargados" class="nav-item nav-link active">Usuarios</a></li>
                      <li><a href="{{route('listar.categoria.autorizar')}}" class="nav-item nav-link active">Autorizar productos</a></li>

                
                    @endif

                    @if(auth()->user()->rol=="vendedor")
                        
                        {{--
                        <li><a href="/usuarios/{{$id}}" class="nav-item nav-link active">Mi Perfil</a></li> 
                        --}}
                        <li><a href="/usuarios/{{Auth::user()->id}}" class="nav-item nav-link active">Mi Perfil</a></li>
                       <li><a href="/productos" class="nav-item nav-link active">Productos en venta</a></li>
                       <li><a href="/showPedido/{{Auth::user()->id}}" class="nav-item nav-link active">Carrito</a></li>
                       
                       <li><a href="/showDetallesPedido/{{Auth::user()->id}}" class="nav-item nav-link active">Mis Compras</a></li>
                    @endif

                      <li><a href="{{route('cerrar.usuario')}}" class="nav-item nav-link active">Logout</a></li>
                  @endauth
                  
                </div>
                <form class="d-flex">
                    <div class="input-group">
                        @yield('buscar')
                    </div>
                </form>
            </div>
        </div>
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