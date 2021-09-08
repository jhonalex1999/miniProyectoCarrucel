<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizacion;
class FrontController extends Controller{
   public function index(){
            
            return view('welcome');
    }
    public function indexOrganizacion(){
            $organizacion=Organizacion::all();
            return view('organizacionVisualizacion',compact('organizacion'));
    }
}