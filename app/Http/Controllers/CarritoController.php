<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Canasta;
use App\Models\Carrito;
use App\Models\Oferta;
use Illuminate\Support\Facades\Storage;


class CarritoController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $total=$this->total();
        $carrito= Carrito::all();
        return view('carrito.index',compact('carrito','total'));
    }

   
    
    public function addCanasta(Canasta $item)
    {
       $array = array('nombre' =>$item->nombre , 'imagen'=>$item->imagen,'cantidad'=>$item->cantidad,'precio'=>$item->precio,'precioT'=>$item->precio);
        Carrito::create($array);
        return redirect('/carrito');

        

    }
      public function addOferta(Oferta $item)
    {
       $array = array('nombre' =>$item->nombre , 'imagen'=>$item->imagen,'cantidad'=>$item->cantidad,'precio'=>$item->precioN,'precioT'=>$item->precioN );
        Carrito::create($array);
        return redirect('/carrito');

        

    }



     public function delete( $id)
    {
       
        $carrito= Carrito::find($id);
        $carrito->delete();
        return back()->with('succes', 'Usuario Eliminado Correctamente');
    }



    
    public function updateCant( Request $request,$id)
    {
        $carrito=Carrito::find($id);
        $datosCarrito = request()->except(['_token','_method']);
        $precio= $carrito->precio;
        $datosCarrito['precioT']=$datosCarrito['cantidad']*$precio;
        Carrito::where('id','=',$id)->update($datosCarrito);
        return redirect('/carrito');
       
    }

    
      public function vaciar() {
        $carrito= Carrito::all();
        foreach ($carrito as $item) {
            $item->delete();
        }
        return back();
                  
     }

     public function total(){
        $total=0;
        $carrito= Carrito::all();
        foreach ($carrito as $item) {
            $total=$total+$item->precioT;
        }
        return $total;
     }

}