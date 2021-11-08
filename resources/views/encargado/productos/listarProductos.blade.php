@extends('layouts.layouts')

@section('title')

@section('contenido')
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
                            @foreach($prods as $prod)
                            <tr>

                                <td>
                                    {{$prod->nombre}}
                                </td>

                                  <td>
                                    {{$prod->descripcion}}
                                  </td>

                                  <td>
                                    {{$prod->precio}}
                                  </td>

                        
                                <td>
                                    
                                    {{$prod->consignar}}
                                </td>
                                <td>
                                    
                                    {{$prod->categoria_id}}
                                </td>
                                <td>
        <a href="/productos/{{$prod->id}}/edit" class="btn btn-info btn-sm">Ver</a>
                                 </td>
                                
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
 </div>

@endsection
