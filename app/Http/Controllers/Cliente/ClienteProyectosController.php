<?php

namespace App\Http\Controllers\Cliente;

use App\Cliente;
use App\Http\Controllers\Controller;
use App\Proyecto;
use App\Producto;
use Illuminate\Http\Request;

class ClienteProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente)
    {
        //
        return view('cliente.proyecto.index',['cliente'=>$cliente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $cliente)
    {
        //
        return view('cliente.proyecto.create',['cliente'=>$cliente,'edit'=>false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Cliente $cliente, Request $request)
    {
        //
        // dd($request->all());
        $proyecto = new Proyecto([
            'responsable'=>$request->responsable,
            'telefono'=>$request->telefono,
            'correo'=>$request->correo
        ]);
        $cliente->proyectos()->save($proyecto);
        for ($i = 0; $i < count($request->nombre) ; $i++) {
            // var_dump($i);
            $producto = new Producto([
                'nombre'=>$request->nombre[$i],
                'alto'=>$request->alto[$i],
                'ancho'=>$request->ancho[$i],
                'profundo'=>$request->profundo[$i],
                'medidas'=>$request->medidas[$i],
                'naturaleza'=>$request->naturaleza[$i],
                'peso_br'=>$request->peso_br[$i],
                'medida_peso'=>$request->medida_peso[$i],
                'bultos'=>$request->bultos[$i],
                'origen'=>$request->origen[$i],
                'destino'=>$request->destino[$i],
                'peso_total'=>$request->peso_total[$i],
                'volumen_total'=>$request->volumen_total[$i],
                'observaciones'=>$request->observaciones[$i]
            ]);
            $proyecto->productos()->save($producto);
        }
        return redirect()->route('clientes.proyectos.index',['cliente'=>$cliente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente, Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente, Proyecto $proyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Cliente $cliente, Request $request, Proyecto $proyecto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente, Proyecto $proyecto)
    {
        //
    }
}
