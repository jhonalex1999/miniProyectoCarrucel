<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Canasta;
use App\Models\Carrito;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Canasta $canasta)
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
       

    }
}