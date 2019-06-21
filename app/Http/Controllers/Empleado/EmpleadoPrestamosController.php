<?php

namespace App\Http\Controllers\Empleado;

use App\Empleado;
use App\EmpleadoPrestamo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class EmpleadoPrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empleado $empleado)
    {
        $prestamos = $empleado->prestamos;
        return view('empleado.prestamo.index',['empleado'=>$empleado,'prestamos'=>$prestamos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Empleado $empleado)
    {
        if ($request->talon_path && $request->file('talon_path')->isValid()) {
            $talon_path = $request->talon_path->storeAs('prestamos/'.$empleado->fullname, 'talon_prestamo'.$request->fecha.'.'.$request->talon_path->extension(), 'public');
        }
        $request['imagen_talon'] = $talon_path;
        $request['empleado_id'] = $empleado->id;
        $prestamo = EmpleadoPrestamo::Create($request->all());
        Alert::success('Información Agregada', 'Se ha registrado correctamente la información');
        $prestamos = $empleado->prestamos;
        return view('empleado.prestamo.index',['empleado'=>$empleado,'prestamos'=>$prestamos]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmpleadoPrestamo  $empleadoPrestamo
     * @return \Illuminate\Http\Response
     */
    public function show(EmpleadoPrestamo $empleadoPrestamo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmpleadoPrestamo  $empleadoPrestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(EmpleadoPrestamo $empleadoPrestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmpleadoPrestamo  $empleadoPrestamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmpleadoPrestamo $empleadoPrestamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmpleadoPrestamo  $empleadoPrestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmpleadoPrestamo $empleadoPrestamo)
    {
        //
    }

    public function getTalon(Empleado $empleado)
    {
        $pdf = PDF::loadView('empleado.prestamo.talon',['presolicitud'=>$presolicitud,'contrato'=>$contrato,'checklist'=>$checklist]);
    }
}
