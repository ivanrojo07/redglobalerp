<?php

namespace App\Http\Controllers\Precargas;

use App\TipoLicencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class TipoLicenciaController extends Controller
{
     public function __construct(){
        $this->titulo = 'Tipo de Licencia';
        $this->agregar = 'licencias.create';
        $this->guardar = 'licencias.store';
        $this->editar ='licencias.edit';
        $this->actualizar = 'licencias.update';
        $this->borrar ='licencias.destroy';
        $this->buscar = 'buscarlicencia';
        // $this->middleware(function ($request, $next) {
        //     if(Auth::check()) {
        //         foreach (Auth::user()->perfil->componentes as $componente)
        //             if($componente->modulo->nombre == "precargas")
        //                 return $next($request);
        //         return redirect()->route('denegado');
        //     } else
        //         return redirect()->route('login');
        // });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $licencias = TipoLicencia::paginate(10);
        return view('precargas.index',['precargas'=>$licencias, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('precargas.create',['titulo'=>$this->titulo,'guardar'=>$this->guardar]);
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
        TipoLicencia::create($request->all());
        Alert::success('Información Agregada', 'Se ha registrado correctamente la información');
        return redirect()->route('licencias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoLicencia  $tipoLicencia
     * @return \Illuminate\Http\Response
     */
    public function show(TipoLicencia $licencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoLicencia  $tipoLicencia
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoLicencia $licencia)
    {
        //
        return view('precargas.edit',['precarga'=>$licencia, 'titulo'=>$this->titulo,'actualizar'=>$this->actualizar]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoLicencia  $tipoLicencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoLicencia $licencia)
    {
        //
        $licencia->update($request->all());
        Alert::success('Información actualizada', 'Se ha actualizado correctamente la información');
        return redirect()->route('licencias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoLicencia  $tipoLicencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoLicencia $licencia)
    {
        //
        $licencia->delete();
        Alert::success('Información eliminada', 'Se ha eliminado correctamente la información');
        return redirect()->route('licencias.index');
    }
    public function buscar(Request $request){
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        $tipoBaja = TipoLicencia::where(function ($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                $q->orWhere('nombre','LIKE',"%$word%")
                    ->orWhere('descripcion','LIKE',"%$word%");
            }
        })->paginate(50);
        return view('precargas.index',['precargas'=>$tipoBaja, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
    }

    public function getLicencias(){
        $licencias = TipoLicencia::get();
        return view('precargas.select',['precargas'=>$licencias]);
    }
}
