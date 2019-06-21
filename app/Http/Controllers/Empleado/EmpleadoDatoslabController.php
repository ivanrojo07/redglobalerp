<?php

namespace App\Http\Controllers\Empleado;

use App\EmpleadoDatoslab;
use App\Empleado;
Use App\TipoBaja;
Use App\TipoPuesto;
Use App\TipoContrato;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert as Alert;


class EmpleadoDatoslabController extends Controller
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
        $datoslabs = $empleado->datosLab()->orderBy('created_at', 'desc')->get();

        $puestos = TipoPuesto::get();
        $contratos =TipoContrato::get();
        
        
        // 
        if (count($datoslabs)==0) {
          
            # code...
            return redirect()->route('empleados.datoslaborales.create',['empleado'=>$empleado]);
        } else {


        $actual=$empleado->datosLab()-> orderBy('created_at', 'desc')->first();
        $puesto=TipoPuesto::where('id',$actual->puesto_id)->first();
        $contrato=TipoContrato::where('id',$actual->contrato_id)->first();

            return view('empleado.datoslab.index',[
                'empleado'=>$empleado,
                'datoslabs'=>$datoslabs,
                'actual'=>$actual,
                'puesto'=>$puesto,
                'contrato'=>$contrato,
                'contratos'=>$contratos,
                'puestos'=>$puestos,
                ]); 
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
        $datoslaborale = new EmpleadoDatosLab;
        $contratos = TipoContrato::get();
        $bajas = TipoBaja::get();
        $puestos = TipoPuesto::get();
        // $bancos=Banco::get();
        $edit = false;
        
        return view('empleado.datoslab.create',[
            'empleado'=>$empleado,
            'bajas'=>$bajas,
            'contratos'=>$contratos,
            'datoslaborale'=>$datoslaborale,
            'puestos'=>$puestos,
            'edit'=>$edit,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Empleado $empleado)
    {
        $datoslab = new EmpleadoDatoslab($request->all());
        $empleado->datosLab()->save($datoslab);
    //--------- BAJA --------------------------------
        if($request->fechabaja!=null){
            // $empleado->delete();
            Alert::success('Baja de Empleado', 'Se redireccionará a la Lista de Empleados');
            return redirect()->route('empleados.datoslaborales.index',['empleado'=>$empleado,'datoslab'=>$datoslab]);
        }else{
             $datoslab->save();
        Alert::info('Datos laborales creado', 'Siga agregando información al empleado');
        return redirect()->route('empleados.datoslaborales.index',['empleado'=>$empleado,'datoslab'=>$datoslab]);
        
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(EmpleadoDatoslab $datoslab)
    {
        // dd($request->sucursal_id);
        // dd($datoslab);
    // $empleados=EmpleadoDatosLab::where('sucursal_id',$request->sucursal_id);
    
    // $area='';
    //   if($datos->area_id==null){
    //     $area='NO DEFINIDO';
    //   }else{
    //     $areas=Area::where('id',$datos->area_id)->first();
    //   $area=$areas->nombre;
    //   }
      
    //   $puesto='';
    //   if($datos->puesto_id==null){
    //     $puesto='NO DEFINIDO';
    //   }else{
    //     $puestos=Puesto::where('id',$datos->puesto_id)->first();
    //   $puesto=$areas->nombre;
    //   }
        $empleado = $datoslab->empleado;

    return view('empleado.datoslab.view',[
                'datoslab'=>$datoslab,
                'empleado'=>$empleado,                
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado, EmpleadoDatoslab $datoslaborale)
    {
        // dd($datoslaborale);
    // $actual1=EmpleadoDatosLab::where('id', $actual)->first();

       
        // $datoslab = new EmpleadosDatosLab;
        // $datoslab->fechacontratacion=$actual1->fechacontratacion;
       
        $contratos = TipoContrato::get();
        $bajas = TipoBaja::get();
        $puestos = TipoPuesto::get();
        
        // $bancos=Banco::get();
        $edit = true;
        return view('empleado.datoslab.create',[
            'datoslaborale'=>$datoslaborale,
            'bajas'=>$bajas,
            'contratos'=>$contratos,
            'empleado'=>$empleado,
            'puestos'=>$puestos,
            'edit'=>$edit]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado, EmpleadoDatoslab $datoslaborale)
    {
        $datoslaborale->update($request->all());
        $datoslaborale->fechaactualizacion = date("Y-m-d");
        $datoslaborale->save();
      //   dd($datoslaborale);
      //   //$datoslab = EmpleadosDatosLab::findOrFail($datoslaborale);
      // $datoslab = new EmpleadoDatosLab;

      //   $datoslab->fechacontratacion = $request->fechacontratacion;
        
      //   $datoslab->fechaactualizacion = date("Y-m-d");

      //   $datoslab->area_id = $request->area_id;
      //    //dd($request->all());
      //   $datoslab->puesto_id = $request->puesto_id;


      //   $datoslab->salarionom = $request->salarionom;
      //   $datoslab->salariodia = $request->salariodia ;
        
      //   $datoslab->periodopaga = $request->periodopaga ;
      //   $datoslab->prestaciones = $request->prestaciones ;
      //   $datoslab->regimen = $request->regimen ;
      //   $datoslab->hentrada = $request->hentrada ;
      //   $datoslab->hsalida = $request->hsalida ;
      //   $datoslab->hcomida = $request->hcomida ;
      //   $datoslab->lugartrabajo = $request->lugartrabajo ;
      //   $datoslab->banco = $request->banco ;
      //   $datoslab->cuenta = $request->cuenta ;
      //   $datoslab->clabe = $request->clabe ;
      //   $datoslab->fechabaja = $request->fechabaja ;
      //   $datoslab->tipobaja_id = $request->tipobaja_id ;
      //   $datoslab->comentariobaja = $request->comentariobaja ;

      //   $datoslab->contrato_id = $request->contrato_id ;
      //   $datoslab->sucursal_id = $request->sucursal_id ;
      //   $datoslab->almacen_id = $request->almacen_id ;

      //   if ($request->bonopuntualidad == 'on') {
      //       # code...
      //       $datoslab->bonopuntualidad = true;
      //       // dd($request->all());
      //   } else {
      //       # code...
      //       $datoslab->bonopuntualidad = false;
      //   }
      //   //$datoslab->update();
      //   $datoslab->save($request->all());
        Alert::success('Datos laborales actualizados');
        return redirect()->route('empleados.datoslaborales.index',['empleado'=>$empleado,'datoslaborale'=>$datoslaborale]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }


}
