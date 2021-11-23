@extends('layouts.layouts')

@section('title')

@section('contenido')
{{--index de vendedor--}}
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
                              <th>stock</th>
                              <th>imagen</th>
                              <th>categoria</th>
                              <th>status</th>
                              <th>motivo</th>
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
                                    {{$pd->stock}}
                                </td>
                        
                                <td>
                                    
                                    {{$pd->imagen}}
                                </td>
                                <td>
                                    
                                    {{$pd->categoria_id}}
                                </td>
                                <td>
                                    
                                    {{$pd->consignar}}
                                </td>
                                <td>
                                    {{$pd->motivo}}
                                </td>
                {{--si el status del producto es diferente de aceptado este le mostrara las opciones de editar y eliminar, si en dado caso es aceptado este no mostrara ninguna opcion--}}
@if($pd->consignar!='aceptado')
                                <td>
        <a href="/productos/{{$pd->id}}/edit" class="btn btn-info btn-sm">Editar</a>
                                 </td>
                                 <td>
         <form action="/productos/{{$pd->id}}" method="POST">
             @csrf
             @method('delete')
             <input type="submit" class="btn btn-danger btn-sm" value="Eliminar" onclick="return confirm('deseas borrar?')">
             
         </form>
                                 </td>
@endif                                 
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