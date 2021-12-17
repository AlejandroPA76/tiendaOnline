@extends('layouts.layouts')

@section('title','Bienvenido contador')
@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th >Vendedor</th>
                            <th >Accion</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                       
                          @foreach ($pd as $p)
                            <tr>
                                <td>{{$p['name']}}</td>
                                
                                <td><a href="{{route('vendedorPagos',$p['id'])}}">Ver Ventas</a></td>
                                <td></td>
                            </tr>
                          @endforeach                            
                         
                      </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection