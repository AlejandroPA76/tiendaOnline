<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ContadorController extends Controller
{
    
     public function __construct(){
        $this->middleware('auth');
        $this->middleware('contador',['only'=> ['index']]);
    }

    public function index()
    {
        return view('contador.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
         
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listaPagos(){
        //$pagoPedidoPendidente = Pedido::where('status','pendiente')->get();
        $qry = DB::select('select distinct folio, status, user_id,img from pedidos where status=?',['pendiente']);
        $pagoPedidoPendidente = json_decode(json_encode($qry), true);
        //echo($pagoPedidoPendidente);
        
        return view('contador.boucher.mostrarBouchers',compact('pagoPedidoPendidente'));
    }

    public function showBaucher(Request $request)
    {
        $total=0;
        echo $request->folio;
        $qry = DB::table('pedidos')
        ->join('productos','pedidos.productos_id','=','productos.id')
        ->select('productos.nombre','productos.precio','productos.descripcion','productos.propietario','pedidos.cantidad','pedidos.id','pedidos.status','pedidos.folio','pedidos.img')
        ->where('pedidos.user_id','=',$request['user_id'])
        ->where('pedidos.folio','=',$request['folio'])
        ->get();

        //var_dump($qry);
        $boucher = json_decode(json_encode($qry), true);

        foreach($boucher as $b){
            $ba = $b['img'];
            $folio = $b['folio'];
            $mul = $b['precio'] * $b['cantidad'];
            $total += $mul;
        }

        
        return view('contador.boucher.autorizarBoucher',compact('boucher','ba','folio','total'));
    }

    public function autorizarBaucher(Request $request){
        $qry = DB::table('pedidos')
        ->select('pedidos.id')
        ->where('pedidos.folio','=',$request['folio'])
        ->get();

        $cls = json_decode(json_encode($qry), true);

        foreach($cls as $cl){
             $pd = Pedido::find($cl['id']);
             $pd->status="aceptado";
             $pd->save();

        }
        return redirect('/');
    }

    public function allPedidos(){
        $pd = Pedido::all();

        return view('contador.boucher.mostrarPedidos',compact('pd'));
    }

}
