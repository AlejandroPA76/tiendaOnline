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
                              <th >Precio</th>
                              <th >Cantidad</th>
                            </tr>
                        </thead>

                        
                            <tbody>
                                @foreach ($cls as $cs)
                                <tr>
                                        <td>
                                            <h5>{{$cs['nombre']}}</h5>
                                        </td>
    
                                        <td>
                                            {{$cs['precio']}}
                                        </td>
    
                                        <td>
                                            {{$cs['cantidad']}}
                                        </td>
                                </tr>
                                <tr>
                                    <td>
                                        <form action="/deleteProductoPedido/{{ $cs["id"] }}" method="POST">
                                            @csrf
                                            @method('delete')
                                                <input type="submit" class="btn btn-danger btn-sm" value="Eliminar" onclick="return confirm('Deseas borrar el Producto de tu Carrito?')">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    @if ($total != 0)
                                    <td></td>
                                    <td></td>
                                    <td><h5>Total: {{$total}}</h5></td>
                                    @endif
                                </tr>


                                <tr>
                                    @if ($total != 0)
                                    <td>
                                        <h6>Seleccione Tipo de Pago</h6>    
                                        <select name="rol">
                                            <option value="">Online</option>
                                            <option value="">Pagar en el Banco</option>
                                        </select> 
                                    </td>
                                    <td></td>                                    
                                    <td>
                                        <a  href="/pagarPedido/{{$id}}" class='btn btn-primary' type="submit">Comprar Ahora!!</a></td>
                                    @endif
                                    
                                </tr>


                            </tbody>                            
                        
                    </table>   

                </div>
            </div>
        </div>
    </div>
</div>    

@endsection