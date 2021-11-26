<?php
//menu vendor index
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Multimedio;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class ProductoController extends Controller
{
   public function index(Request $request)
    {
        //obtengo el id del usuario y por medio de este muestro sus productos que tiene a la venta
        $usuario=auth()->user()->id;
        //$pds = Producto::all();
        $pds = DB::table('productos')->where('propietario',$usuario)->get();
        return view('supervisor.producto.index',compact('pds'));

        

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cts = Categoria::all();
        return view('supervisor.producto.agregarProduc',compact('cts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //metodo para agregar los productos
        $nus = new Producto();
        

        $nus->nombre = $request->input('nombre');
        $nus->descripcion = $request->input('descripcion');
        $nus->precio = $request->input('precio');
        $nus->stock =$request->input('stock');
        $nus->consignar = $request->input('consignar');
        $nus->propietario = $request->input('propietario');
        $nus->categoria_id = $request->input('ct');
        $nus->save();
        //return redirect('productos');
       if ($request->hasfile('foto')) {
        //con la variable de abajo puedo traer el ultimo id del registro del producto
        $ultimoregistro = Producto::latest()->first()->id;

        //traigo las imagemenes de array y las guardo en una variable $imagenes 
       $imagenes = $request->foto;
       //foreach donde recorro todo el array del imagenes

       foreach($imagenes as $imagen){
        //variable del modelo
       $fotos = new Multimedio();
        //guardo la imagen en la carpeta uploads       
        $fotos->foto=$imagen->store('uploads','public');
        $fotos->productos_id=$ultimoregistro;
        $fotos->save();
       }  
       }
       return redirect('productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
       
        
        //aqui se muestran los productos de las categorias en especifico de una categorias sus productos
        $search1=$request->get('search');
        $Productos = DB::table('productos')->where('categoria_id',$id)->where('consignar','aceptado')->where('nombre','like','%' .$search1.'%')->get();
        if(!Auth::check()){
            $id = 0;
            return view('cliente.producto.mostrarProductos',compact('Productos','search1','id'));
        }else{
            $id = auth::user()->id;
            return view('cliente.producto.mostrarProductos',compact('Productos','search1','id'));
        }
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sl = Producto::find($id);
        $cts = Categoria::all();
        //agrego esto para encontrar las fotos con el mismo id de producto
        $photos = Multimedio::where('productos_id',$sl->id)->get();
        return view('supervisor.producto.editarProduct',compact('sl','cts','photos'));
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
        $nus = Producto::find($id);
        $imagenes = $request->imagenUpdate; 
        ////encuetro las imagenes y las elimino para cargar las nuevas
        $photos = Multimedio::where('productos_id',$nus->id)->get();

        $nus->nombre = $request->input('nombre');
        $nus->descripcion = $request->input('descripcion');
        $nus->precio = $request->input('precio');
        $nus->stock = $request->input('stock');
        $nus->save();
        
        //ahora subo las nuevas imagenes 

        //traigo las imagenes de array y las guardo en una variable $imagenes  

       //foreach($photos as $photo){
       //Storage::delete('public/'.$photo->foto);
       //}

       //foreach donde recorro todo el array del imagenes 
         if ($request->hasfile('imagenUpdate')) {
            foreach($imagenes as $imagen){ 
       
             //variable del modelo 

        $fotos = new Multimedio(); 

        //guardo la imagen en la carpeta uploads        

        $fotos->foto=$imagen->store('uploads','public'); 

        $fotos->productos_id=$nus->id; 
           $fotos->save(); 
        }
       
         }
       
       
         
         
        return redirect('productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //encuentro el producto con el id 
        $nus = Producto::find($id);
        //encuentro las fotos donde el campo productos_id es el mismo con el id del producto
        $photos = Multimedio::where('productos_id',$nus->id)->get();
        //elimino los datos del producto
        $nus->delete();
        //recorro todas las fotos y las elimino en cada bucle
        foreach($photos as $photo){
        Storage::delete('public/'.$photo->foto);
        }
        return redirect('productos');
    }
    

}
