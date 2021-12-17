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
                              <th >Folio de la compra</th>  
                              <th>status</th>
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
                                        {{$cs['status']}}
                                    </td>

                                    <td>
                                        
                                            <a  href="{{route('menuComprobante',$cs['folio'])}}" class='btn btn-primary' type="submit">ver Compra</a>   
                                        
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