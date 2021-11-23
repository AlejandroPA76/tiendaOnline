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
                                
                                <!-- Button trigger modal -->
                                
                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Agregar al Carrito
                                </button></td>
                                
                    </div>          
                </div>                
            </div>                    
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
    </div>
</div>    

<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-glow/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>

<script type="text/javascript">
    jQuery(function ($) {
        $(".tabs_div").shieldTabs();
    });
</script>

<style>
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
</style>
@endsection