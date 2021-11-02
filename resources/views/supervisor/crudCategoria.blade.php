@extends('layouts.layouts')

@section('title')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" href='/categorias/create'>Agregar Categoria</a>
                    
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
        <a href="/categorias/{{$cat->id}}/edit" class="btn btn-info btn-sm">Editar</a>
                                 </td>
                                 <td>
         <form action="/categorias/{{$cat->id}}" method="POST">
             @csrf
             @method('delete')
             <input type="submit" class="btn btn-danger btn-sm" value="Eliminar" onclick="return confirm('deseas borrar?')">
             
         </form>
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