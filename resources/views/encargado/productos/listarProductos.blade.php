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
        <a href="{{route('autorizar.producto',$prod->id)}}" class="btn btn-info btn-sm">Ver</a>
        
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

