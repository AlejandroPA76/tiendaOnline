@extends('layouts.layouts')

@section('title')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                              <th >Folio</th>  
                              <th >Producto</th>
                              <th >Precio</th>
                              <th >Cantidad</th>
                              <th >Estatus</th>
                              <th >Total</th>
                              <th >Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cls as $cs)
                            <tr>
                                    <td>
                                        {{$cs['folio']}}
                                    </td>
                                    <td>
                                        <h5>{{$cs['nombre']}}</h5>
                                    </td>

                                    <td>
                                        {{$cs['precio']}}
                                    </td>

                                    <td>
                                        {{$cs['cantidad']}}
                                    </td>

                                    <td>
                                        {{$cs['status']}}
                                    </td>

                                    <td>
                                        {{$cs['precio']*$cs['cantidad']}}
                                    </td>

                                    <td>
                                        @if ($cs['status'] == 'pendiente')
                                            <a  href="" class='btn btn-primary' type="submit">Subir Comprobante de Pago!!</a>   
                                        @endif
                                    </td>
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