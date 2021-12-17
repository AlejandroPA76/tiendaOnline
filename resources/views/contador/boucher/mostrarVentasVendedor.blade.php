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
                            <th >Producto</th>
                            <th >Fecha de la Venta</th>
                            <th >Cantidad</th>
                            <th >Precio</th>
                            <th >Monto</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                       
                          @foreach ($pd as $p)
                            <tr>
                                <td>{{$p['name']}}</td>
                                <td>{{$p['nombre']}}</td>
                                <td>{{$p['created_at']}}</td>
                                <td>{{$p['cantidad']}}</td>
                                <td>{{$p['precio']}}</td>
                                <td>{{$p['precio']*$p['cantidad']}}</td>
                                
                            </tr>
                          @endforeach   
                          
                          <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total</td>
                                <td>{{$total}}</td>
                          </tr>
                         
                      </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection