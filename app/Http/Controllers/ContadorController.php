<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
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
    public function show(Request $request)
    {
         $qry = DB::table('pedidos')
        ->join('productos','pedidos.productos_id','=','productos.id')
        ->select('productos.nombre','productos.precio','pedidos.cantidad','pedidos.img')
        ->where('pedidos.user_id','=',auth()->user()->id)
        ->where('pedidos.folio','=',$request['folio'])
        ->get();

        $boucher = json_decode(json_encode($qry), true);

        return view('contador.boucher.autorizarBoucher',compact('boucher'));
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
        echo("agregado");

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
        $qry = DB::select('select distinct folio, status, img from pedidos where status=?',['pendiente']);
        $pagoPedidoPendidente = json_decode(json_encode($qry), true);
        //echo($pagoPedidoPendidente);
        return view('contador.boucher.mostrarBouchers',compact('pagoPedidoPendidente'));
    }
}
