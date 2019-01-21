<?php

namespace App\Http\Controllers\Tarifas;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Http\Controllers\Controller;

class TerrestreController extends Controller
{
    //
    public function create(Proyecto $proyecto)
    {
    	// dd($proyecto);
    	return view('proyecto.terrestre.create',['proyecto'=>$proyecto]);
    }
}
