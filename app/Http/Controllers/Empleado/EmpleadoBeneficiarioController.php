<?php

namespace App\Http\Controllers\Empleado;

use App\Empleado;
use App\EmpleadoBeneficiario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmpleadoBeneficiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empleado $empleado)
    {
        //
        $beneficiario = $empleado->beneficiario;
        // dd($beneficiario);
        if ($beneficiario) {
            return view('empleado.beneficiario.view',['empleado'=>$empleado,'beneficiario'=>$beneficiario]);
        } else {
            return redirect()->route('empleados.beneficiario.create',['empleado'=>$empleado]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empleado $empleado)
    {
        //
        $beneficiario = new EmpleadoBeneficiario;
        return view('empleado.beneficiario.form',['empleado'=>$empleado,'beneficiario'=>$beneficiario,'edit'=>false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Empleado $empleado,Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado, EmpleadoBeneficiario $beneficiario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado, EmpleadoBeneficiario $beneficiario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado, EmpleadoBeneficiario $beneficiario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado, EmpleadoBeneficiario $beneficiario)
    {
        //
    }
}
