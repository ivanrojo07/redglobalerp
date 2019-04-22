<?php

namespace App\Http\Controllers\Cliente;

use App\Cotizacion;
use App\Mercancia;
use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente)
    {
        // dd($cliente);
        //
        // if (Auth::guard('cliente')->user()->cliente) {
        //     $cliente = Auth::guard('cliente')->user()->cliente;
        //     $cotizaciones = $cliente->cotizacions;
        //     return view('cliente.cotizacion.index',['cotizaciones'=>$cotizaciones]);
        // } else {
        //     dd('no');
        // }
        // dd('index');
         $cotizaciones=Cotizacion::paginate(10);
        return view('Cliente.cotizacion.index',['cotizaciones' => $cotizaciones,'cliente'=>$cliente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $cliente)
    {
        //
        $edit = false;
        $cotizacion = new Cotizacion;
        $numero=Cotizacion::orderBy('created_at', 'desc')->pluck('id')->first();
        // return 'hola mundo';
        // return view('empleado.cotizaciones.create',['cotizacion'=>$cotizacion,'numero'=>$numero,'edit'=>$edit]);
        return view('cliente.cotizacion.create',['cliente'=>$cliente]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Cliente $cliente)
    {
        $cotizacion=new Cotizacion([
                'responsable'=>$request->responsable,
                'telefono'=>$request->telefono,
                'correo'=>$request->correo
            ]);
        $cotizacion->cliente_id=$cliente->id;
        $cotizacion->save();        
        // $cotizacion=[];
        foreach ($request->nombre as $key => $nombre) {
            $mercancia= new Mercancia([
                'nombre'=>$nombre,
                'line1_origen'=>$request->linea1_origen[$key],                
                'cp_origen'=>$request->cp_origen[$key],
                'line1_destino'=>$request->linea1_destino[$key],                
                'cp_destino'=>$request->cp_destino[$key],
                'naturaleza'=>$request->naturaleza[$key],
                'alto'=>$request->alto[$key],
                'ancho'=>$request->ancho[$key],
                'profundo'=>$request->profundo[$key],
                'medidas'=>$request->medidas[$key],
                'peso_br'=>$request->peso_br[$key],
                'medida_peso'=>$request->medida_peso[$key],
                'bultos'=>$request->bultos[$key],
                'peso_total'=>$request->peso_total[$key],
                'volumen_total'=>$request->volumen_total[$key],
                'tipo_servicio'=>$request->tipo_servicio[$key],
                'observaciones'=>$request->observaciones[$key]
                
            ]);   
            $mercancia->cotizacion_id=$cotizacion->id;
            $mercancia->save();
            // $mercancia->nombre = $nombre;
            // $mercancia->naturaleza = $request->naturaleza[$key];
            // $mercancia->tipo_servicio=$request->tipo_servicio[$key];
            // $mercancia->linea1_origen=$request->linea1_origen[$key];
            // $mercancia->cp_origen = $request->cp_origen[$key];
            // array_push($cotizacion,$mercancia);
            // var_dump($nombre);
            
        }
        //return view();
        // $mercancia=new Mercancia($request->all());
        return 'guardado';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente,Cotizacion $cotizacion)
    {
        //$cotizacion=$cliente::find(1)->cotizacions;
        return view('cliente.cotizacion.show',['cotizacion'=>$cotizacion]);
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotizacion $cotizacion)
    {
        //
    }
}
