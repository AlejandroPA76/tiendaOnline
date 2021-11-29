@extends('layouts.layouts')

@section('title')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" href='/supervisor/create'>Alta a un Usuario</a>
                    
                </div>

                <div class="card-body">
                  
                    <table class="table">
                          <thead>
                            <tr>
            
                              <th >Nombre</th>
                              <th >Apellido Paterno</th>
                              <th >Apellido Materno</th>
                              <th >Email</th>
                              <th >Rol</th>
                              <th >Accion</th>

                            </tr>
                          </thead>
                          <tbody>
                            @foreach($usrs as $us)
                            <tr>

                                <td>
                                    {{$us->name}}
                                </td>

                                  <td>
                                    {{$us->apellido_p}}
                                  </td>

                                 <td>
                                    {{$us->apellido_m}}
                                </td>
                                 <td>
                                    {{$us->email}}
                                </td>
                                <td>
                                    {{$us->rol}}
                                </td>
                                <td>
        <a href="/supervisor/{{$us->id}}" class="btn btn-info btn-sm">Editar</a>
                                 </td>
                                 <td>
         <form action="/supervisor/{{$us->id}}" method="POST">
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