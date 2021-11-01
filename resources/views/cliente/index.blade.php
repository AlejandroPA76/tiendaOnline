Bienvenido cliente

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

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
<li><a href="{{route('cerrar.usuario')}}">Logout</a></li>

<div class="container">
	
  <div class="row">
  	@foreach($cats as $cat)
    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
      <div class="card">
      	
        <img class="card-img-top" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/bologna-1.jpg" alt="Bologna">
        <div class="card-body">
          <h4 class="card-title">{{$cat->nombre}}</h4>
          <p class="card-text">{{$cat->descripcion}}</p>
          <a href="#" class="card-link">Read More</a>
     
        </div>
        
      </div>
     
    </div>
    @endforeach
  </div>
     
</div>

</body>
</html>