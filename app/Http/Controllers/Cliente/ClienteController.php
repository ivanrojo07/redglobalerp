<?php

namespace App\Http\Controllers\Cliente;

use App\Cliente;
use App\ClienteBanco;
use App\ClienteCobranza;
use App\ClienteLegal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use UxWeb\SweetAlert\SweetAlert as Alert;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientes = Cliente::paginate(10);
        return view('cliente.index',['clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $edit = false;
        $tipo = null;
        $cliente = new Cliente;
        return view('cliente.create',['edit'=>$edit,'tipo_cliente'=>$tipo]);
    }

    public function form($tipo)
    {
        $edit = false;
        $cliente = new Cliente;
        App::setLocale('es');
        if($tipo === "extranjero_ing"){
            App::setLocale('en');
        }
        return view('cliente.create',['edit'=>$edit,'tipo_cliente'=>$tipo,'cliente'=>$cliente]);
        // dd(__('Datos generales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($request->tipo_cliente == "nacional") {
            $request['pais'] = "México";
        }
        // dd($request->all());
        $cliente = Cliente::create($request->all());
        $cobranza = new ClienteCobranza($request->all());
        $cliente->cobranza()->save($cobranza);
        $banco = new ClienteBanco($request->all());
        $cliente->banco()->save($banco);
        $legal= new ClienteLegal($request->all());
        $cliente->legal()->save($legal);
        Alert::success($cliente->razon_social.' guardado exitosamente','Por favor sigue agregando información');
        return redirect()->route('clientes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
