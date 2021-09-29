<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $oferta= Oferta::all();
        return view('oferta.index')->with('oferta',$oferta);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('oferta.create');
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
        $request->validate([
            'nombre' => 'required', 'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024', 'cantidad' => 'required', 'descuento' => 'required','precio'=>'required'
        ]);

        $oferta=request()->except('_token');
        if($request->hasFile('imagen')){
            $oferta['imagen']=$request->file('imagen')->store   ('uploads','public');
        }
        $oferta['precioN']=$oferta['precio']-($oferta['precio'] * ($oferta['descuento']/100));
        Oferta::insert($oferta);
        return redirect('/oferta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function show(Oferta $oferta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function edit(Oferta $oferta)
    {
        //
        return view('oferta.edit', compact('oferta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosOferta = request()->except(['_token','_method']);
        $datosOferta['precioN']=$datosOferta['precio']-($datosOferta['precio'] * ($datosOferta['descuento']/100));
        if($request->hasFile('imagen')){
            $oferta=Oferta::findOrFail($id);

            Storage::delete('public/'.$oferta->imagen);

            $datosOferta['imagen']=$request->file('imagen')->store('uplodas','public');
        }
        Oferta::where('id','=',$id)->update($datosOferta);
        $oferta=Oferta::findOrFail($id);

        return redirect('/oferta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $oferta= oferta::find($id);
        $oferta->delete();
        return back()->with('succes', 'Usuario Eliminado Correctamente');
    }
}
