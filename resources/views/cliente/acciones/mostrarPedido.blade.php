@extends('layouts.layouts')

@section('title','Bienvenido contador')
@section('contenido')



  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-body">

            <table class="table">
              <form  action="{{route('subirComprobante')}}"  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              
              
                          <thead>
                            <tr>
            
                              <th >Nombre</th>
                              <th >Precio</th>
                              <th >Cantidad</th>
                              <th>total</th>
                       

                            </tr>
                          </thead>
                          <tbody>
                            @foreach($cls as $cl)
                            	<tr>
							      <td>{{$cl['nombre']}}</td>
							      <td>{{$cl['precio']}}</td>
							      <td>{{$cl['cantidad']}}</td>
							      <td>{{$cl['cantidad']*$cl['precio']}}</td>
							    </tr>
                  <input type="hidden" name="folio" value="{{$cl['folio']}}">

                            @endforeach

                            <tr>
                            	@if($status == "pendiente")
                            	<td>
                             
                            <div class="mb-3">
                              <label for="formFile" class="form-label">Subir comprobante</label>
                              <input class="form-control" type="file" id="formFile" name="foto">
                              <br>
                              <button type="submit" class="btn btn-primary">enviar boucher</button>
                            </div>


                              
                 
                            	</td>
                            	
                            	@endif
                            </tr>
                          </tbody>
                            </form>
                        </table>



 </div>
                
                  
                  
               
            </div>
        </div>
    </div>
</div>
@endsection
