<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Canasta;
class FrontController extends Controller{
   public function index(){
            
            return view('welcome');
    }
    public function indexCanasta(){
            $canasta=Canasta::all();
            return view('canastaVisualizacion',compact('canasta'));
    }
}