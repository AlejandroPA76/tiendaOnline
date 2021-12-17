@extends('layouts.layouts')

@section('title','Bienvenido contador')
@section('contenido')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           <h1>Datos del pago</h1>
            <div class="row" id="gradient">
               
            </div>
            <div class="row">
                <div class="tabs_div">
                   
                    <div>
                        <table class="table">
                            <tbody>
                              @foreach($boucher as $b)
                                <tr>
                                  <td class="success">folio: </td>
                                    <td>{{$b['nombre']}}</td>
                                </tr>
                                
                                <img src="{{ asset('storage/'.$b['img']) }}" class="img-fluid" alt="Eniun" width="700">
                                </tr>
                               
                                <tr>
                                       <td class="success">status del pago: </td>
                                    <td>{{$b['precio']}}</td>
                                </tr>

                                 <tr>
                                  <td class="success">cantidad: </td>
                                    <td>{{$b['cantidad']}}</td>
                                </tr>
                                @endforeach
                                 <tr>

                                  <td>

                                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Autorizar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menu de autorizacion del pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="{{route('autorizarpago')}}" method="post">
        @csrf
        @method('put')
         <label class="success">Presiona el boton para aceptar el pago</label>
         <input type="hidden" name="folio" value="{{$boucher->folio}}">
         <input type="hidden" name="status" value="aceptado">

          <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Confirmar autorizacion</button>
      </div>

       </form>
      </div>
     
    </div>
  </div>
</div>
                                  </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    <div>
                    </div>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection