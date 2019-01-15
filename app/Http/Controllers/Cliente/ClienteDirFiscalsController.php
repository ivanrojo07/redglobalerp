<?php

namespace App\Http\Controllers\Cliente;

use App\Cliente;
use App\ClienteFiscals;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClienteFiscals  $clienteFiscals
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente, ClienteFiscals $clienteFiscals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClienteFiscals  $clienteFiscals
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente, ClienteFiscals $clienteFiscals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClienteFiscals  $clienteFiscals
     * @return \Illuminate\Http\Response
     */
    public function update(Cliente $cliente, Request $request, ClienteFiscals $clienteFiscals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClienteFiscals  $clienteFiscals
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente, ClienteFiscals $clienteFiscals)
    {
        //
    }
}
