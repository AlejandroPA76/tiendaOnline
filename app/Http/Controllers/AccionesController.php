<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Producto;
use App\Models\Multimedio;
use App\Models\Pedido;
use App\Models\Respuesta;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Storage;

class AccionesController extends Controller
{
    //
    private $orden;

    public function showProducto($id){

        $sl  = Producto::find($id);
        $photos = Multimedio::where('productos_id',$sl->id)->get();
        

        $qry = DB::table('comentarios')
        ->join('users','comentarios.user_id','=','users.id')
        ->select('comentarios.id','comentarios.comentario','comentarios.user_id','comentarios.created_at','users.name')
        ->where('comentarios.productos_id','=',$id)
        ->get();
        
        

        $cs = json_decode(json_encode($qry), true);
        

        
        
        $qry = DB::table('respuestas')
        ->join('users','respuestas.user_id','=','users.id')
        ->select('respuestas.id','respuestas.comentarios_id','respuestas.respuesta','respuestas.user_id','respuestas.created_at','users.name',)
        ->get();
        
        $rs = json_decode(json_encode($qry), true);

        

        if(!Auth::check()){
            $id = 0;
        return view('cliente.acciones.mostrarProducto',compact('sl','id','photos','cs','rs'));
        }else{
            $id = auth::user()->id;
        return view('cliente.acciones.mostrarProducto',compact('sl','id','photos','cs','rs'));
        }        
    
    }

    public function addCommentary(Request $request){
        $c = new Comentario();
        $c->comentario = $request->Comentario;
        $c->user_id = $request->id_user;
        $c->productos_id = $request->id_producto;
        $c->created_at = date('Y-m-d');
        $c->save();
        
        return redirect('Showproducto/'.$request->id_producto);
    }

    public function deleteCommentary(Request $request, $id){
        $cs = Comentario::find($id);
        $cs->delete();
        return redirect('Showproducto/'.$request->id_producto);
    }

    public function addResponse(Request $request,$id){
        $r= new Respuesta();
        $r->respuesta = $request->Respuesta;
        $r->user_id = $request->id_user;
        $r->comentarios_id = $id;
        $r->created_at = date('Y-m-d');
        $r->save();

        return redirect('Showproducto/'.$request->id_producto);
    }

    public function deleteResponse(Request $request, $id){
        $rs = Respuesta::find($id);
        $rs->delete();
        return redirect('Showproducto/'.$request->id_producto);
    }

    //con esta funcion convierto al cliente a vendedor
    public function clienteVendedor(Request $request, $id){
        $us = User::find($id);
        $us->rol = $request->input('rol');
        $us->save();
        return redirect('/');
    }

    public function addPedido(Request $request){
        $pd = new Pedido();

        $pd->cantidad = $request->Cantidad;
        $pd->status = "carrito";
        $pd->user_id = $request->User_id;
        $pd->productos_id = $request->Productos_id;
        
        
        $pd->created_at = date('Y-m-d');

        $nus = Producto::find($request->Productos_id);
        $nus->stock = $nus->stock - $request->Cantidad;
        $nus->save();

        $pd->save();

        return redirect('Showproducto/'.$request->Productos_id);
    }


    public function showPedido($id){
        $total = 0;
        $qry = DB::table('pedidos')
        ->join('productos','pedidos.productos_id','=','productos.id')
        ->select('productos.nombre','productos.precio','pedidos.cantidad','pedidos.id')
        ->where('pedidos.user_id','=',$id)
        ->where('pedidos.status','=','carrito')
        ->get();
        
        

        $cls = json_decode(json_encode($qry), true);

        foreach ($cls as $cs) {
          $mul = $cs['precio'] * $cs['cantidad'];
          $total += $mul;
        }


        //print_r($cls);         

         
        if($id != auth::user()->id){
            return redirect('showPedido/'.auth::user()->id);
        }else{
        $id = auth::user()->id;
        return view('cliente.acciones.mostrarCarrito',compact('cls','id','total'));
        }   
        
    }

    public function deleteProductoPedido($id){
        $pd = Pedido::find($id);

        $pd->cantidad;

        $us = Producto::find($pd->productos_id);        
        $us->stock += $pd->cantidad;
        $us->save();

        $pd->delete();
        return redirect('showPedido/'.auth::user()->id);
    }

    
    public function showPedidos($id){
        $total = 0;
        //$qry = DB::table('pedidos')
        //->join('productos','pedidos.productos_id','=','productos.id')
        //->select('productos.nombre','productos.precio','pedidos.cantidad','pedidos.id','pedidos//.status','pedidos.folio','pedidos.img')
        //->where('pedidos.user_id','=',$id)
        //->where('pedidos.status','!=','carrito')
        //->get();
        $qry = DB::select('select distinct folio, status, img from pedidos');
        
        

        $cls = json_decode(json_encode($qry), true);

        //foreach ($cls as $cs) {
        //  $mul = $cs['precio'] * $cs['cantidad'];
        //  $total += $mul;
        //}

        
        
        

        
        if($id != auth::user()->id){
            return redirect('showPedido/'.auth::user()->id);
        }else{
        $id = auth::user()->id;
        return view('cliente.acciones.mostrarMisCompras',compact('cls','id'));
        }   
    }

    public function pagarPedido(Request $request, $id){
        $folio = uniqid();
        $qry = DB::table('pedidos')
        ->select('pedidos.id','pedidos.folio')
        ->where('pedidos.user_id','=',$id)
        ->where('pedidos.status','=','carrito')
        ->get();
        

        $cls = json_decode(json_encode($qry), true);

        //var_dump($request->Pgs);

        

        foreach ($cls as $cs) {


            //print_r($cs['id']);
             $pd = Pedido::find($cs['id']);
            if($request->Pgs == 'On'){
                $pd->status = "aceptado";
                $pd->tipopago = "Online";
                if(is_null($pd->folio)){
                    $pd->folio = $folio;
                }
            }else if($request->Pgs == 'Pb'){
                $pd->status = "pendiente";
                $pd->tipopago = "Banco";
                if(is_null($pd->folio)){
                    $pd->folio = $folio;
                }
            }
             $pd->save();
        }

        return redirect('showPedidos/'.auth::user()->id);
    }

    public function validadCorreoExistencia(Request $request){
        //echo('holaaa');
         //aqui llega lo que introduje el email 
         $mivariable = $request->input('email');
         //echo($mivariable);
 
         //$us = User::all()->get();
         //aqui hago una consulta a la base de datos para saber si hay algun correo electronico
         //similar al que llego por requests y traigo solo el campo email con ->value
         $us = DB::table('users')
         ->where('email',$mivariable)
         ->value('email');
         //echo($us);
         //comparo si el resultado de la consulta es igual al email que introduje
         if ($us == $mivariable) {
             echo "Este correo ya esta registrado";
         }
         if ($us != $mivariable) {
          echo "Puedes registrarte con este email";
         }
 
     }

     public function menuComprobante(Request $request){
        $qry = DB::table('pedidos')
        ->join('productos','pedidos.productos_id','=','productos.id')
        ->select('productos.nombre','productos.precio','pedidos.cantidad','pedidos.id','pedidos.status','pedidos.folio','pedidos.img')
        ->where('pedidos.user_id','=',auth()->user()->id)
        ->where('pedidos.folio','=',$request['folio'])
        ->get();

        $cls = json_decode(json_encode($qry), true);

        foreach($cls as $cl){
          
            $status = $cl['status'];

        }
        return view('cliente.acciones.mostrarPedido',compact('cls','status'));
     }

     public function subirComprobante(Request $request){
        //var_dump($request['foto']. '  '. $request['folio']);

        $qry = DB::table('pedidos')
        ->select('pedidos.id')
        ->where('pedidos.user_id','=',auth()->user()->id)
        ->where('pedidos.folio','=',$request['folio'])
        ->get();

         $cls = json_decode(json_encode($qry), true);

         foreach($cls as $cl){
            $pedido = Pedido::find($cl['id']);
            if($request->hasfile('foto')){
            $pedido['img']=$request->file('foto')->store('uploads','public');
        }else{echo('esta vacias');}
            $pedido->save();
         }



     }


}
