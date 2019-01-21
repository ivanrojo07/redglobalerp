<?php

namespace App\Http\Controllers\Tarifas;

use App\Http\Controllers\Controller;
use App\Proyecto;
use Illuminate\Http\Request;

class MaritimoController extends Controller
{
    //
    public function create(Proyecto $proyecto)
    {
    	return view('proyecto.maritimo.create',['proyecto'=>$proyecto]);
    }
}
