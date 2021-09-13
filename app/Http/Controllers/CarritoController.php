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
        $carrito= Carrito::all();
        return view('carrito.index')->with('carrito',$carrito);
    }

   
    
    public function addCanasta(Canasta $item)
    {
       $array = array('nombre' =>$item->nombre , 'imagen'=>$item->imagen,'cantidad'=>$item->cantidad,'precio'=>$item->precio);
        Carrito::create($array);
        return redirect('/carrito');

        

    }
      public function addOferta(Oferta $item)
    {
       $array = array('nombre' =>$item->nombre , 'imagen'=>$item->imagen,'cantidad'=>$item->cantidad,'precio'=>$item->precio);
        Carrito::create($array);
        return redirect('/carrito');

        

    }



     public function delete( $id)
    {
       
        $carrito= Carrito::find($id);
        $carrito->delete();
        return back()->with('succes', 'Usuario Eliminado Correctamente');
    }



    
    public function updateCant(Carrito $item)
    {
        $array = array('nombre' => $item->nombre,'imagen'=>$item->imagen,'cantidad'=>$item->cantidad,'precio'=>$item->precio );

        Carrito::where('id','=',$item->id)->update($array);
       


        return redirect('/carrito');
       
    }

    
      public function vaciar() {
        $carrito= Carrito::all();
        foreach ($carrito as $item) {
            $item->delete();
        }
        return back();
                  
     }
}