<?php

namespace App\Http\Controllers\Empleado;

use App\Empleado;
use App\EmpleadoLicencia;
use App\Http\Controllers\Controller;
use App\TipoLicencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert as Alert;
class EmpleadoLicenciaController extends Controller
{

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                foreach (Auth::user()->perfil->componentes as $componente)
                    if($componente->modulo->nombre == "rh")
                        return $next($request);
                return redirect()->route('denegado');
            } else
                return redirect()->route('login');
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empleado $empleado)
    {
        //
        if ($empleado->tipo == "Chofer") {
            $licencias= $empleado->licencias()->orderBy("created_at",'desc')->get();
            $licencia = $empleado->licencias->last();
            return view('empleado.licencia.index',['empleado'=>$empleado,'licencias'=>$licencias,'licencia'=>$licencia]);
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
        $licencia = new EmpleadoLicencia;
        $tipos = TipoLicencia::get();
        $edit = false;
        return view('empleado.licencia.create',['empleado'=>$empleado,'licencia'=>$licencia,'edit'=>$edit,'tipos'=>$tipos]);

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
        // dd($request->all());
        $licencia = new EmpleadoLicencia($request->all());
        $empleado->licencias()->save($licencia);
        Alert::success('Licencia registrada', 'Licencia registrada en el sistema');
        return redirect()->route('empleados.licencias.index',['empleado'=>$empleado]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmpleadoLicencia  $licencia
     * @return \Illuminate\Http\Response
     */
    public function show(EmpleadoLicencia $licencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmpleadoLicencia  $licencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado, EmpleadoLicencia $licencia)
    {
        //
        $tipos = TipoLicencia::get();
        $edit = true;
        return view('empleado.licencia.create',['empleado'=>$empleado,'licencia'=>$licencia,'edit'=>$edit,'tipos'=>$tipos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmpleadoLicencia  $licencia
     * @return \Illuminate\Http\Response
     */
    public function update(Empleado $empleado, Request $request, EmpleadoLicencia $licencia)
    {
        //
        $licencia->update($request->all());
        Alert::success('Licencia actualizada', 'Licencia actualizada en el sistema');
        return redirect()->route('empleados.licencias.index',['empleado'=>$empleado]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmpleadoLicencia  $licencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmpleadoLicencia $licencia)
    {
        //
    }
}
