<?php

namespace App\Http\Controllers\Tarifas;

use App\Http\Controllers\Controller;
use App\Proyecto;
use Illuminate\Http\Request;

class AereoController extends Controller
{
    //
    public function create(Proyecto $proyecto)
    {
    	// dd($proyecto->productos);
    	return view('proyecto.aereo.create',['proyecto'=>$proyecto]);
    }
}
