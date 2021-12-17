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
                            <th >Cantidad</th>
                            <th >Tipo de Pago</th>
                            <th >status</th>
                            <th>folio</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                          @foreach ($pd as $p)
                            <tr>
                                <td>{{$p['cantidad']}}</td>
                                <td>{{$p['tipopago']}}</td>
                                <td>{{$p['status']}}</td>
                                <td>{{$p['folio']}}</td>
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