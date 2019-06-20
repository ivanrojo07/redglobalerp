<?php

namespace App\Http\Controllers\Empleado;

use App\Empleado;
use App\EmpleadoExpediente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class EmpleadoExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empleado $empleado)
    {
        $expediente = $empleado->expediente;
        if ($expediente == null) {
            # code...
            return redirect()->route('empleados.expediente.create',['empleado'=>$empleado]);
        }
        else {

            return view('empleado.expediente.view',['empleado'=>$empleado, 'expediente'=>$expediente]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empleado $empleado)
    {
        return view('empleado.expediente.create', ['empleado' => $empleado]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Empleado $empleado)
    {
        if ($request->hoja_palco && $request->file('hoja_palco')->isValid()) {
            $hoja_palco = explode("/",$request->hoja_palco->storeAs('expedientes/'.$empleado->fullname, 'hoja_palco.'.$request->hoja_palco->extension(), 'public'));
        }
        if ($request->identificacion && $request->file('identificacion')->isValid()) {
            $identificacion = explode("/",$request->identificacion->storeAs('expedientes/'.$empleado->fullname, 'identificacion.'.$request->identificacion->extension(), 'public'));
        }
        if ($request->comprobante_domicilio && $request->file('comprobante_domicilio')->isValid()) {
            $comprobante_domicilio = explode("/",$request->comprobante_domicilio->storeAs('expedientes/'.$empleado->fullname, 'comprobante_domicilio.'.$request->comprobante_domicilio->extension(), 'public'));
        }
        if ($request->curp && $request->file('curp')->isValid()) {
            $curp = explode("/",$request->curp->storeAs('expedientes/'.$empleado->fullname, 'curp.'.$request->curp->extension(), 'public'));
        }
        if ($request->rfc && $request->file('rfc')->isValid()) {
            $rfc = explode("/",$request->rfc->storeAs('expedientes/'.$empleado->fullname, 'rfc.'.$request->rfc->extension(), 'public'));
        }
        if ($request->acta_nacimiento && $request->file('acta_nacimiento')->isValid()) {
            $acta_nacimiento = explode("/",$request->acta_nacimiento->storeAs('expedientes/'.$empleado->fullname, 'acta_nacimiento.'.$request->acta_nacimiento->extension(), 'public'));
        }
        if ($request->imss && $request->file('imss')->isValid()) {
            $imss = explode("/",$request->imss->storeAs('expedientes/'.$empleado->fullname, 'imss.'.$request->imss->extension(), 'public'));
        }
        if ($request->contrato && $request->file('contrato')->isValid()) {
            $contrato = explode("/",$request->contrato->storeAs('expedientes/'.$empleado->fullname, 'contrato.'.$request->contrato->extension(), 'public'));
        }

        $expediente = EmpleadoExpediente::Create([
            'empleado_id'=>$empleado->id,
            'hoja_palco'=>$hoja_palco[2],
            'identificacion'=>$identificacion[2],
            'comprobante_domicilio'=>$comprobante_domicilio[2],
            'curp'=>$curp[2],
            'rfc'=>$rfc[2],
            'acta_nacimiento'=>$acta_nacimiento[2],
            'imss'=>$imss[2],
            'contrato'=>$contrato[2]
        ]);
        Alert::success('Información Agregada', 'Se ha registrado correctamente la información');
        return redirect()->route('empleados.expediente.show',['empleado'=>$empleado,'empleadoExpediente'=>$expediente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmpleadoExpediente  $empleadoExpediente
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado, EmpleadoExpediente $empleadoExpediente)
    {
        return view('empleado.expediente.view',['empleado'=>$empleado,'expediente'=>$empleado->expediente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmpleadoExpediente  $empleadoExpediente
     * @return \Illuminate\Http\Response
     */
    public function edit(EmpleadoExpediente $empleadoExpediente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmpleadoExpediente  $empleadoExpediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmpleadoExpediente $empleadoExpediente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmpleadoExpediente  $empleadoExpediente
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmpleadoExpediente $empleadoExpediente)
    {
        //
    }
}
