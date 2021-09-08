<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizacion;
use App\Models\Canasta;
use App\Models\Oferta;
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
}