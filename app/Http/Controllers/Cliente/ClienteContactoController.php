<?php

namespace App\Http\Controllers\Cliente;

use App\Cliente;
use App\ClienteContacto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert as Alert;


class ClienteContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente)
    {
        //
        return view('cliente.contacto.index',['cliente'=>$cliente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $cliente)
    {
        //
        $contacto = new ClienteContacto; 
        return view('cliente.contacto.form',['cliente'=>$cliente,'edit'=>false,'contacto'=>$contacto]);
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
        $contacto = new ClienteContacto($request->all());
        $cliente->contactos()->save($contacto);
        Alert::success($contacto->nombre.' '.$contacto->appat.' '.$contacto->apmat.' guardado exitosamente');
        return redirect()->route('clientes.contactos.index',['cliente'=>$cliente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClienteContacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente, ClienteContacto $contacto)
    {
        //
        return view('cliente.contacto.show',['cliente'=>$cliente,'contacto'=>$contacto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClienteContacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente, ClienteContacto $contacto)
    {
        //
        return view('cliente.contacto.form',['cliente'=>$cliente,'edit'=>true,'contacto'=>$contacto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClienteContacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Cliente $cliente, Request $request, ClienteContacto $contacto)
    {
        //
         if ($cliente->id == $contacto->cliente->id) {
            $contacto->update($request->all());
            Alert::success($contacto->nombre.' '.$contacto->appat.' '.$contacto->apmat.' actualizado exitosamente');
            return redirect()->route('clientes.contactos.index',['cliente'=>$cliente]);
        } else {
            Alert::error('No se puede actualizar este registro.');
            return redirect()->route('clientes.contactos.index',['cliente'=>$cliente]);
        }
    }   
        

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClienteContacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente, ClienteContacto $contacto)
    {
        //
        if ($cliente->id == $contacto->cliente->id) {
            $contacto->delete();
            Alert::success($contacto->nombre.' '.$contacto->appat.' '.$contacto->apmat.' eliminado exitosamente');
            return redirect()->route('clientes.contactos.index',['cliente'=>$cliente]);
        } else {
            Alert::error('No se puede eliminar este registro.');
            return redirect()->route('clientes.contactos.index',['cliente'=>$cliente]);
        }
    }
}
