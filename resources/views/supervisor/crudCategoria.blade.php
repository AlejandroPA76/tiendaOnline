@extends('supervisor.index')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" href="{{route('add.cat')}}">Agregar Categoria</a>
                    
                </div>

                <div class="card-body">
                  
                    <table class="table">
                          <thead>
                            <tr>
            
                              <th >Nombre</th>
                              <th >Descripcion</th>
                              <th >Imagen</th>
                              <th >Activa</th>
                              <th >Accion</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($cats as $cat)
                            <tr>

                                <td>
                                    {{$cat->nombre}}
                                </td>

                                  <td>
                                    {{$cat->descripcion}}
                                  </td>

                                 <td>
                                    {{$cat->imagen}}
                                </td>
                                 <td>
                                    {{$cat->activa}}
                                </td>
                        
                                <td>
        <a href="#" class="btn btn-info btn-sm">Editar</a>

                                 
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