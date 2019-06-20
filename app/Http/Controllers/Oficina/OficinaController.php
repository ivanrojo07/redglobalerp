<?php

namespace App\Http\Controllers\Oficina;

use App\Oficina;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OficinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $oficinas = Oficina::get();
        if (count($oficinas) == 0) {
            # code...
            return redirect()->route('oficinas.create');
        }
        else {

            return view('oficina.index',['oficinas'=>$oficinas]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        $oficina = new Oficina;
        return view('oficina.create', ['edit'=>$edit, 'oficina' =>$oficina]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oficina = Oficina::create($request->all());
        return redirect()->route('oficinas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Oficina  $oficina
     * @return \Illuminate\Http\Response
     */
    public function show(Oficina $oficina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Oficina  $oficina
     * @return \Illuminate\Http\Response
     */
    public function edit(Oficina $oficina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Oficina  $oficina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oficina $oficina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Oficina  $oficina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oficina $oficina)
    {
        //
    }
}
