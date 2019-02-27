<?php

namespace App\Http\Controllers\Empleado\Cliente;

use App\ClienteCredential;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use UxWeb\SweetAlert\SweetAlert as Alert;


class ClienteCredentialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $credenciales = ClienteCredential::orderBy('created_at','desc')->paginate(10);
        return view('empleado.cliente.credential.index',['credenciales'=>$credenciales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $credencial = new ClienteCredential;
        return view('empleado.cliente.credential.form',['credencial'=>$credencial,'edit'=>false]);
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
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:cliente_credentials',
            'password' => 'required|string|min:6|confirmed'
        ];
        $this->validate($request, $rules);
        $credencial = ClienteCredential::create([
            'name' =>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        if ($credencial) {
            $credencial->sendCredentialNotification($request->password);
            Alert::success('Registro guardado');
            return redirect()->route('credencials.index');
        } else {
            Alert::danger('Error al guardar el registro');
            return redirect()->route('credencials.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClienteCredential  $credencial
     * @return \Illuminate\Http\Response
     */
    public function show(ClienteCredential $credencial)
    {
        //
        // dd($credencial);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClienteCredential  $credencial
     * @return \Illuminate\Http\Response
     */
    public function edit(ClienteCredential $credencial)
    {
        //
        return view('empleado.cliente.credential.form',['credencial'=>$credencial,'edit'=>true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClienteCredential  $credencial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClienteCredential $credencial)
    {
        //
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:cliente_credentials,id,'.$credencial->id,
        ];
        $this->validate($request, $rules);
        $credencial->update([
            'name' =>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        if ($credencial) {
            // $credencial->sendCredentialNotification($request->password);
            Alert::success('Registro guardado');
            return redirect()->route('credencials.index');
        } else {
            Alert::danger('Error al guardar el registro');
            return redirect()->route('credencials.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClienteCredential  $credencial
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClienteCredential $credencial)
    {
        $credencial->delete();
        Alert::success('Registro eliminado');
        return redirect()->route('credencials.index');
    }
}
