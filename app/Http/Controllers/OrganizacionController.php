<?php

namespace App\Http\Controllers;

use App\Models\Organizacion;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class OrganizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $organizaciones =Organizacion::all();
        return view('organizacion.index')->with('organizaciones',$organizaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('organizacion.create');
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
        /*
        $organizacion = new organizacion();
        $organizacion->nombre = $request->get('nombre');
        $organizacion->imagen = $request->get('imagen');
        $organizacion->ubicacion = $request->get('ubicacion');
        $organizacion->telefono = $request->get('telefono');
        $organizacion->save();
        return redirect('/organizacion');
        */

        $request->validate([
            'nombre' => 'required', 'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024', 'ubicacion' => 'required', 'telefono'=>'required'
        ]);

        $organizacion=request()->except('_token');
        if($request->hasFile('imagen')){
            $organizacion['imagen']=$request->file('imagen')->store   ('uploads','public');
        }
        Organizacion::insert($organizacion);
        return redirect('/organizacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organizacion  $organizacion
     * @return \Illuminate\Http\Response
     */
    public function show(Organizacion $organizacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organizacion  $organizacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Organizacion $organizacion)
    {
        //
        return view('organizacion.edit',compact('organizacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organizacion  $organizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        /*
        $organizacion = Organizacion::find($id);
        $organizacion->nombre=$request->get('nombre');
        $organizacion->imagen=$request->get('imagen');
        $organizacion->ubicacion=$request->get('ubicacion');
        $organizacion->telefono=$request->get('telefono');
        $organizacion->save();
        return redirect('/organizacion');*/

        $datosOrganizacion = request()->except(['_token','_method']);

        if($request->hasFile('imagen')){
            $organizacion=Organizacion::findOrFail($id);

            Storage::delete('public/'.$organizacion->imagen);

            $datosOrganizacion['imagen']=$request->file('imagen')->store('uplodas','public');
        }
        Organizacion::where('id','=',$id)->update($datosOrganizacion);
        $organizacion=Organizacion::findOrFail($id);

        return redirect('/organizacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organizacion  $organizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $organizacion = organizacion::find($id);
        $organizacion->delete();
        return back()->with('succees','Organizacion Eliminada Correctamente');
    }
}
