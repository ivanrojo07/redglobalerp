<?php

namespace App\Http\Controllers\Tarifas;

use App\Http\Controllers\Controller;
use App\Proyecto;
use Illuminate\Http\Request;

class MariticoController extends Controller
{
    //
    public function create(Proyecto $proyecto)
    {
    	dd($proyecto);
    }
}
