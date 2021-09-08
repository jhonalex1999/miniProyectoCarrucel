<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Canasta;

use Illuminate\Support\Facades\Storage;


class CanastaController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $canasta= Canasta::all();
        return view('canasta.index')->with('canasta',$canasta);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('canasta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required', 'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024', 'cantidad' => 'required', 'precio'=>'required'
        ]);

        $canasta=request()->except('_token');
        if($request->hasFile('imagen')){
            $canasta['imagen']=$request->file('imagen')->store   ('uploads','public');
        }
        Canasta::insert($canasta);
        return redirect('/canasta');

        

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
        return view('canasta.edit', compact('canasta'));
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
        /*$canasta= Canasta::find($id);
        $canasta->nombre=$request->get('nombre');
        $canasta->imagen=$request->get('imagen');
        $canasta->cantidad=$request->get('cantidad');
        $canasta->precio=$request->get('precio');
        $canasta->save();*/

        $datosCanasta = request()->except(['_token','_method']);

        if($request->hasFile('imagen')){
            $canasta=Canasta::findOrFail($id);

            Storage::delete('public/'.$canasta->imagen);

            $datosCanasta['imagen']=$request->file('imagen')->store('uplodas','public');
        }
        Canasta::where('id','=',$id)->update($datosCanasta);
        $canasta=Canasta::findOrFail($id);

        return redirect('/canasta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       

        $canasta = canasta::find($id);
        $canasta->delete();
        return back()->with('succes', 'Usuario Eliminado Correctamente');
    }
}