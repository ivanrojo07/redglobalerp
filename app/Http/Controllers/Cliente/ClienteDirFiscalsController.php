<?php

namespace App\Http\Controllers\Cliente;

use App\Cliente;
use App\ClienteFiscal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert as Alert;

class ClienteDirFiscalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente)
    {
        //
        return view('cliente.fiscal.index',['cliente'=>$cliente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $cliente)
    {
        //
        $dirfiscal= new ClienteFiscal;
        return view('cliente.fiscal.form',['edit'=>false,'cliente'=>$cliente,'dirfiscal'=>$dirfiscal]);
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
        $dirFiscal = new ClienteFiscal($request->all());
        $cliente->dirFiscales()->save($dirFiscal);
        Alert::success($dirFiscal->nombre.' guardado exitosamente');
        return redirect()->route('clientes.dirfiscals.index',['cliente'=>$cliente]);
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClienteFiscal  $dirfiscal
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente, ClienteFiscal $dirfiscal)
    {
        //
        // dd($dirfiscal);
        return view('cliente.fiscal.show',['cliente'=>$cliente,'dirfiscal'=>$dirfiscal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClienteFiscal  $dirfiscal
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente, ClienteFiscal $dirfiscal)
    {
        //
        return view('cliente.fiscal.form',['edit'=>true,'cliente'=>$cliente,'dirfiscal'=>$dirfiscal]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClienteFiscal  $dirfiscal
     * @return \Illuminate\Http\Response
     */
    public function update(Cliente $cliente, Request $request, ClienteFiscal $dirfiscal)
    {
        //
        if ($cliente->id == $dirfiscal->cliente->id) {
            $dirfiscal->update($request->all());
            Alert::success($dirfiscal->nombre.' editado exitosamente');
            return redirect()->route('clientes.dirfiscals.index',['cliente'=>$cliente]);
        } else {
            Alert::error('No puedes editar esta dirección exitosamente');
            return redirect()->route('clientes.dirfiscals.index',['cliente'=>$cliente]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClienteFiscal  $dirfiscal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente, ClienteFiscal $dirfiscal)
    {
        //
        if ($cliente->id == $dirfiscal->cliente->id) {
            $dirfiscal->delete();
            Alert::success($dirfiscal->nombre.' borrado exitosamente.');
            return redirect()->route('clientes.dirfiscals.index',['cliente'=>$cliente]);
        } else {
            Alert::error('No puedes borrar esta dirección.');
            return redirect()->route('clientes.dirfiscals.index',['cliente'=>$cliente]);
        }
    }
}
