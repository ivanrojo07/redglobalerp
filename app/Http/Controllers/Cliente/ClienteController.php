<?php

namespace App\Http\Controllers\Cliente;

use App\Cliente;
use App\ClienteBanco;
use App\ClienteCobranza;
use App\ClienteDocumento;
use App\ClienteLegal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
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
        // dd($request->cif_tax_nit_rut->getClientOriginalName());
        // dd($request->hasFile('cif_tax_nit_rut'));
        // dd($request->file('cif_tax_nit_rut')->isValid());
        $cliente = Cliente::create($request->all());
        $cobranza = new ClienteCobranza($request->all());
        $cliente->cobranza()->save($cobranza);
        $banco = new ClienteBanco($request->all());
        $cliente->banco()->save($banco);
        $legal= new ClienteLegal($request->all());
        $cliente->legal()->save($legal);
        if ($request->hasFile('cif_tax_nit_rut') &&  $request->file('cif_tax_nit_rut')->isValid()) {
            $cif_tax_nit_rut = Storage::putFileAs(
                'public/cif_tax_nit_rut'.$cliente->id, $request->file('cif_tax_nit_rut'), $request->cif_tax_nit_rut->getClientOriginalName()
            );
        }
        if ($request->hasFile('comp_dom') &&  $request->file('comp_dom')->isValid()) {
            $comp_dom = Storage::putFileAs(
                'public/comp_dom'.$cliente->id, $request->file('comp_dom'), $request->comp_dom->getClientOriginalName()
            );
        }
        if ($request->hasFile('acta_constitutiva') &&  $request->file('acta_constitutiva')->isValid()) {
            $acta_constitutiva = Storage::putFileAs(
                'public/acta_constitutiva'.$cliente->id, $request->file('acta_constitutiva'),  $request->acta_constitutiva->getClientOriginalName()
            );
        }
        if ($request->hasFile('identificacion_rep_legal') &&  $request->file('identificacion_rep_legal')->isValid()) {
            $identificacion_rep_legal = Storage::putFileAs(
                'public/identificacion_rep_legal'.$cliente->id, $request->file('identificacion_rep_legal'), $request->identificacion_rep_legal->getClientOriginalName()
            );
        }
        if ($request->hasFile('carta_poder') &&  $request->file('carta_poder')->isValid()) {
            $carta_poder = Storage::putFileAs(
                'public/carta_poder'.$cliente->id, $request->file('carta_poder'), $request->carta_poder->getClientOriginalName()
            );
        }
        $documento = new ClienteDocumento([
            'cif_tax_nit_rut'=>$cif_tax_nit_rut,
            'comp_dom'=>$comp_dom,
            'acta_constitutiva'=>$acta_constitutiva,
            'identificacion_rep_legal'=>$identificacion_rep_legal,
            'carta_poder'=>$carta_poder
        ]);
        $cliente->documento()->save($documento);
        Alert::success($cliente->razon_social.' guardado exitosamente','Por favor sigue agregando información');
        return redirect()->route('clientes.index');

    }
    public function cif(Cliente $cliente)
    {
        // dd(storage_path("app/".$cliente->documento->cif_tax_nit_rut));
        return response()->download(storage_path("app/".$cliente->documento->cif_tax_nit_rut));
    }
    public function compDom(Cliente $cliente)
    {
        // dd(storage_path("app/".$cliente->documento->cif_tax_nit_rut));
        return response()->download(storage_path("app/".$cliente->documento->comp_dom));
    }
    public function actaCons(Cliente $cliente)
    {
        // dd(storage_path("app/".$cliente->documento->cif_tax_nit_rut));
        return response()->download(storage_path("app/".$cliente->documento->acta_constitutiva));
    }
    public function repLeg(Cliente $cliente)
    {
        // dd(storage_path("app/".$cliente->documento->cif_tax_nit_rut));
        return response()->download(storage_path("app/".$cliente->documento->identificacion_rep_legal));
    }
    public function cartaPod(Cliente $cliente)
    {
        // dd(storage_path("app/".$cliente->documento->cif_tax_nit_rut));
        return response()->download(storage_path("app/".$cliente->documento->carta_poder));
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
