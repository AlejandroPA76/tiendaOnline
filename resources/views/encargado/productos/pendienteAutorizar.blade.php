@extends('layouts.layouts')

@section('title')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" href='/productos/create'>Agregar Producto</a>
                    
                </div>

                <div class="card-body">
                  
                    <table class="table">
                          <thead>
                            <tr>
            
                              <th >Nombre</th>
                              <th >Descripcion</th>
                              <th >Precio</th>
                              <th>consignar</th>
                              <th>categoria</th>
                              <th >Accion</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($pds as $pd)
                            <tr>

                                <td>
                                    {{$pd->nombre}}
                                </td>

                                  <td>
                                    {{$pd->descripcion}}
                                  </td>

                                  <td>
                                    {{$pd->precio}}
                                  </td>

                        
                                <td>
                                    
                                    {{$pd->consignar}}
                                </td>
                                <td>
                                    
                                    {{$pd->categoria_id}}
                                </td>
                                <td>
        <a href="/productos/{{$pd->id}}/edit" class="btn btn-info btn-sm">Ver</a>
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