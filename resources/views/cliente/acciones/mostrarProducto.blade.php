@extends('layouts.layouts')

@section('title')

@section('contenido')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           <h1>Descripcion del producto</h1>
            <div class="row" id="gradient">

                <div class="col-md-4">
                    {{--esta variable viene del controlador AccionesController--}}
                    @foreach($photos as $photo)
                      <img src="{{ asset('storage/'.$photo->foto) }}" class="img-fluid" alt="Eniun" width="100">
                    @endforeach
                </div>
               
            </div>
            <div class="row">
                <div class="tabs_div">                   
                    <div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    {{--variable $sl viene de AccionesController--}}
                                    <td class="success">Nombre: </td>
                                    <td>{{$sl->nombre}}</td>
                                </tr>
                                <tr>
                                    <td class="success">Precio: </td>
                                      <td>{{$sl->precio}}</td>
                                </tr>
                                <tr>
                                  <td class="success">Descripcion: </td>
                                    <td>{{$sl->descripcion}}</td>
                                </tr>
                                

                                <tr>
                                    @can('buyPropioProducto',$sl)                                    
                                    <form action="{{route('addPedido')}}" method="POST"> 
                                        <td>
                                           
                                            <label>Stock Disponibles:</label>
    
                                                <div id="c-sto">
                                                    <select name="Cantidad">
                                                        @for ($i = 1; $i <= $sl->stock; $i++)
                                                         <option value="{{$i}}">{{$i}} Unidad</option>
                                                        @endfor
                                                        
                                                        
                                                    </select>
    
                                                 <label>Disponibles: {{$sl->stock}}</label>
                                                </div>
    
                                         </td>
    
                                        <td>
                                    
                                                @csrf
                                                <input type="hidden" class="form-control"  name="User_id" value="{{Auth::user()->id}}">
                                                <input type="hidden" class="form-control"  name="Productos_id" value="{{$sl->id}}">
                                                @if($sl->stock !=0)
                                                <button  class='btn btn-primary' type="submit">Agregar al Carrito</button>    
                                                @endif
                                        </td>
                                    </form>
                                    
                                    <td>
                                    <form >
                                        @if($sl->stock !=0)
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Comprar Ahora</button>
                                        @endif
                                    </form>    
                                    </td>
    
                                    
                                    @endcan
                                    </tr>

                            </tbody>
                        </table>          
                    </div>          
                </div>                
            </div>                               
        </div>
    </div>    
</div>

<div class="container">
    <div class="row">    
        <section id="app">
            <div class="container-commentary">
              <div class="row">
                <div class="col-6">
                @guest
                <div>
                    <h4>Registrate para Hacer Preguntas</h4>
                </div>   
                @endguest    
                @auth
                <div>
                    <h4>Pregunta sobre el Producto</h4>
                </div>
                <form action="{{route('addComentary')}}" method="POST">

                    @csrf
                    <input type="hidden" class="form-control"  name="id_user" value="{{$id}}">
                    <input type="hidden" class="form-control"  name="id_producto" value="{{$sl->id}}">
                    <textarea type="text" class="input" placeholder="Escribe tu Pregunta" v-model="newItem" name="Comentario"></textarea>
                    <button  class='primaryContained float-right' type="submit">Enviar</button>
                    

                </form>
                @endauth 

                </div><!-- End col -->
              </div><!--End Row -->
            </div><!--End Container -->
          </section><!-- end App -->         
    </div>
</div>        

<div class="container">
    <div class="row">
        <section id="app">
            <div class="container-commentary">
              <div class="row">
                <div class="col-6">
                  <div class="comment">
                    <div>
                        <h4>Preguntas</h4>
                    </div>
                    <div>
                        @foreach ($cs as $c)
                        <div class="container">
                            <div class="dialogbox">
                              <div class="body">
                                <span class="tip tip-up"></span>
                                <div class="message">
                                        <h5>{{$c['name']}}: {{$c['created_at']}}</h5>
                                        <p>{{$c['comentario']}}</p>
                                        @auth
                                            @if ($c['user_id'] == Auth::user()->id)
                                            <form action="/deleteCommentary/{{$c['id']}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" class="form-control"  name="id_producto" value="{{$sl->id}}">
                                                <input type="submit" class="btn btn-danger btn-sm" value="Eliminar" onclick="return confirm('deseas borrar su Comentario?')">
                                            </form>
                                            @endif
                                                    <form action="/addResponse/{{$c['id']}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" class="form-control"  name="id_user" value="{{$id}}">
                                                        <input type="hidden" class="form-control"  name="id_comentary" value="{{$c['id']}}">
                                                        <input type="hidden" class="form-control"  name="id_producto" value="{{$sl->id}}">
                                                        <textarea type="text" class="input" placeholder="Escribe una Respuesta" v-model="newItem" name="Respuesta"></textarea>
                                                        <button  class='primaryContained float-right' type="submit">Enviar</button>
                                                    </form>
                                        @endauth
                                    <h4>Respuestas</h4>
                                        @foreach ($rs as $r)
                                        @if ($c['id'] == $r['comentarios_id'])  
                                        <div class="dialogbox">
                                            <div class="body">
                                              <span class="tip tip-up"></span>
                                              <div class="message">
                                                <h5>{{$r['name']}}: {{$r['created_at']}}</h5>
                                                <p>{{$r['respuesta']}}</p>
                                                @auth
                                                @if ($r['user_id'] == Auth::user()->id)
                                                <form action="/deleteResponse/{{$r['id']}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" class="form-control"  name="id_producto" value="{{$sl->id}}">
                                                    <input type="submit" class="btn btn-danger btn-sm" value="Eliminar" onclick="return confirm('deseas borrar su Comentario?')">
                                                </form>
                                                @endif

                                                @endauth

                                              </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                            
                                          
                                        
                                </div>
                              </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                  </div><!--End Comment-->
                </div><!--End col -->
            </div><!-- End row -->
            </div><!--End Container -->
          </section><!-- end App -->       
    </div>
</div>    

<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-glow/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>

<script type="text/javascript">
    jQuery(function ($) {
        $(".tabs_div").shieldTabs();
    });
</script>

<script languague="javascript">
    function mostrar() {
        div = document.getElementById('Commentary-response');
        a = document.getElementById('response');
        a1 = document.getElementById('ocultar');
        div.style.display = '';
        a.style.display = 'none';
        a1.style.display = 'block';
    }

    function cerrar() {
        div = document.getElementById('Commentary-response');
        a = document.getElementById('response');
        a1 = document.getElementById('ocultar');

        a.style.display = 'block';
        a1.style.display = 'none';
        div.style.display = 'none';
    }
</script>

<style>
    
    .container-commentary {
	max-width: 800px;
	margin: 30px auto;
	background: #fff;
	border-radius: 8px;
	padding: 20px;
    }
    .comment {
	display: block;
	transition: all 1s;
    }
    .commentClicked {
	min-height: 0px;
	border: 1px solid #eee;
	border-radius: 5px;
	padding: 5px 10px
    }
    .container textarea {
	width: 100%;
	border: none;
	background: #E8E8E8;
	padding: 5px 10px;
	height: 80px;
	border-radius: 5px 5px 0px 0px;
	border-bottom: 2px solid #016BA8;
	transition: all 0.5s;
	margin-top: 15px;
    }
    button.primaryContained {
	background: #016ba8;
	color: #fff;
	padding: 10px 10px;
	border: none;
	margin-top: 0px;
	cursor: pointer;
	text-transform: uppercase;
	letter-spacing: 4px;
	box-shadow: 0px 2px 6px 0px rgba(0, 0, 0, 0.25);
	transition: 1s all;
	font-size: 10px;
	border-radius: 5px;
    }
    .pb-product-details-ul {
        list-style-type: none;
        padding-left: 0;
        color: black;
    }

        .pb-product-details-ul > li {
            padding-bottom: 5px;
            font-size: 15px;
        }

    #gradient {
        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#feffff+0,ddf1f9+31,a0d8ef+62 */
        background: #feffff; /* Old browsers */
        background: -moz-linear-gradient(left, #feffff 0%, #ddf1f9 31%, #a0d8ef 62%); /* FF3.6-15 */
        background: -webkit-linear-gradient(left, #feffff 0%,#ddf1f9 31%,#a0d8ef 62%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to right, #feffff 0%,#ddf1f9 31%,#a0d8ef 62%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#feffff', endColorstr='#a0d8ef',GradientType=1 ); /* IE6-9 */
        border: 1px solid #f2f2f2;
        padding: 20px;
    }

    #hits {
        border-right: 1px solid white;
        border-left: 1px solid white;
        vertical-align: middle;
        padding-top: 15px;
        font-size: 17px;
        color: white;
    }

    #fan {
        vertical-align: middle;
        padding-top: 15px;
        font-size: 17px;
        color: white;
    }

    .pb-product-details-fa > span {
        padding-top: 20px;
    }
    .tip {
  width: 0px;
  height: 0px;
  position: absolute;
  background: transparent;
  border: 10px solid #ccc;
}

.tip-up {
  top: -25px; /* Same as body margin top + border */
  left: 10px;
  border-right-color: transparent;
  border-left-color: transparent;
  border-top-color: transparent;
}

.tip-down {
  bottom: -25px;
  left: 10px;
  border-right-color: transparent;
  border-left-color: transparent;
  border-bottom-color: transparent;  
}

.tip-left {
  top: 10px;
  left: -25px;
  border-top-color: transparent;
  border-left-color: transparent;
  border-bottom-color: transparent;  
}

.tip-right {
  top: 10px;
  right: -25px;
  border-top-color: transparent;
  border-right-color: transparent;
  border-bottom-color: transparent;  
}

.dialogbox .body {
  position: relative;
  max-width: 300px;
  height: auto;
  margin: 20px 10px;
  padding: 5px;
  background-color: #DADADA;
  border-radius: 3px;
  border: 5px solid #ccc;
}

.body .message {
  min-height: 30px;
  border-radius: 3px;
  font-family: Arial;
  font-size: 14px;
  line-height: 1.5;
  color: #797979;
}


</style>
            
@endsection
