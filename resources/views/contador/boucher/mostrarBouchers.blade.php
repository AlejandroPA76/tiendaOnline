@extends('layouts.layouts')

@section('title','Bienvenido contador')
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
                              <th >Status</th>
                              <th >Cantidad</th>
                              <th>Acccion</th>

                            </tr>
                          </thead>
                          <tbody>
                            @foreach($pagoPedidoPendidente as $ppp)
                            	<tr>
							      <td>{{$ppp->folio}}</td>
							      <td>{{$ppp->status}}</td>
							      <td>{{$ppp->cantidad}}</td>
							      <td><a href="">ver</a></td>
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