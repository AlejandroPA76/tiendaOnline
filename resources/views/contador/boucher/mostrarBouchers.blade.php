@extends('layouts.layouts')

@section('title','Bienvenido contador')
@section('contenido')


  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-body">

            <table class="table">
              <form action="{{route('ver.boucher')}}" method="post">
                @csrf                

            
                          <thead>
                            <tr>
            
                              <th >Folio</th>
                              <th >Status</th>
                              <th>Acccion</th>

                            </tr>
                          </thead>
                          <tbody>
                            @foreach($pagoPedidoPendidente as $ppp)
                            	<tr>
							      <td>{{$ppp['folio']}}</td>
							      <td>{{$ppp['status']}}</td>
							      <td>
                      <input type="hidden" name="folio" value="{{$ppp['folio']}}">
                      <input type="hidden" name="user_id" value="{{$ppp['user_id']}}">
                       <button type="submit" class="btn btn-primary">Ver</button>

                    </td>
							    </tr>
                            @endforeach
                          </tbody>
                          </form>
                        </table>
 </div>
                
                  
                  
               
            </div>
        </div>
    </div>
</div>
@endsection