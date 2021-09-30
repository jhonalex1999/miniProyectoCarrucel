<?php

namespace App\Http\Controllers;

use App\Models\Inversionista;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class InversionistaController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $inversionistas =Inversionista::all();
        return view('inversionista.index')->with('inversionistas',$inversionistas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('inversionista.create');
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
            'nombre' => 'required', 'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024', 'descripcion' => 'required', 'correo'=>'required'
        ]);

        $inversionista=request()->except('_token');
        if($request->hasFile('imagen')){
            $inversionista['imagen']=$request->file('imagen')->store   ('uploads','public');
        }
        Inversionista::insert($inversionista);
        return redirect('/inversionista');    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inversionista  $inversionista
     * @return \Illuminate\Http\Response
     */
    public function show(Inversionista $inversionista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inversionista  $inversionista
     * @return \Illuminate\Http\Response
     */
    public function edit(Inversionista $inversionista)
    {
        //
        return view('inversionista.edit',compact('inversionista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inversionista  $inversionista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
       $request->validate([
            'nombre' => 'required', 'descripcion' => 'required', 'correo'=>'required'
        ]);

        $datosInversionista = request()->except(['_token','_method']);

        if($request->hasFile('imagen')){
            $inversionista=Inversionista::findOrFail($id);

            Storage::delete('public/'.$inversionista->imagen);

            $datosInversionista['imagen']=$request->file('imagen')->store('uplodas','public');
        }
        Inversionista::where('id','=',$id)->update($datosInversionista);
        $inversionista=Inversionista::findOrFail($id);

        return redirect('/inversionista');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inversionista  $inversionista
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $inversionista = inversionista::find($id);
        $inversionista->delete();
        return back()->with('succees','Inversionista Eliminado Correctamente');
    }
}
