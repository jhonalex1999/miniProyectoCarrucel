<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizacion;
use App\Models\Canasta;
use App\Models\Oferta;
use App\Models\Inversionista;
use App\Models\Evento;

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
     public function indexOferta(){
            $oferta=Oferta::all();
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