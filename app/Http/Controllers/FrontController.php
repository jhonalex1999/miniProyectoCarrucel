<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizacion;
use App\Models\Canasta;
use App\Models\Oferta;
use App\Models\Inversionista;
use App\Models\Evento;
use DB;

class FrontController extends Controller{
    public function index(){

        return view('welcome');
    }
    public function indexOrganizacion(){
        $organizacion=Organizacion::all();
        return view('organizacion/organizacionVisualizacion',compact('organizacion'));
    }
    public function indexCanasta(){
        $canasta=Canasta::all();
        return view('canasta/canastaVisualizacion',compact('canasta'));
    }

    public function indexCanastaPrecioAsc(){
        $canasta = DB::table('canastas')
        ->orderBy('precio','ASC')
        ->get();
        return view('canasta/canastaVisualizacion',compact('canasta'));
    }
    public function indexCanastaPrecioDesc(){
        $canasta = DB::table('canastas')
        ->orderBy('precio','DESC')
        ->get();
        return view('canasta/canastaVisualizacion',compact('canasta'));
    }
    public function indexCanastaNombreAsc(){
        $canasta = DB::table('canastas')
        ->orderBy('nombre','ASC')
        ->get();
        return view('canasta/canastaVisualizacion',compact('canasta'));
    }
    public function indexCanastaNombreDesc(){
        $canasta = DB::table('canastas')
        ->orderBy('nombre','DESC')
        ->get();
        return view('canasta/canastaVisualizacion',compact('canasta'));
    }


    public function indexOferta(){
        $oferta=Oferta::all();
        return view('oferta/ofertaVisualizacion',compact('oferta'));
    }
    public function indexOfertaPrecioAsc(){
        $oferta = Oferta::select('id','nombre','imagen','cantidad','descuento','precio','precioN')
        ->orderBy('precioN','ASC')
        ->get();
        return view('oferta/ofertaVisualizacion',compact('oferta'));
    }
    public function indexOfertaPrecioDesc(){
        $oferta = Oferta::select('id','nombre','imagen','cantidad','descuento','precio','precioN')
        ->orderBy('precioN','DESC')
        ->get();
        return view('oferta/ofertaVisualizacion',compact('oferta'));
    }
    public function indexOfertaNombreAsc(){
        $oferta = Oferta::select('id','nombre','imagen','cantidad','descuento','precio','precioN')
        ->orderBy('nombre','ASC')
        ->get();
        return view('oferta/ofertaVisualizacion',compact('oferta'));
    }
    public function indexOfertaNombreDesc(){
        $oferta = Oferta::select('id','nombre','imagen','cantidad','descuento','precio','precioN')
        ->orderBy('nombre','DESC')
        ->get();
        return view('oferta/ofertaVisualizacion',compact('oferta'));
    }



    public function indexInversionista(){
        $inversionista=Inversionista::all();
        return view('inversionista/inversionistaVisualizacion',compact('inversionista'));
    }
    public function indexEvento(){
        $evento=Evento::all();
        return view('evento/eventoVisualizacion',compact('evento'));
    }
}