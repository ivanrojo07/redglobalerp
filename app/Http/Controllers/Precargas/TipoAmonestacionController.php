<?php

namespace App\Http\Controllers\Precargas;

use App\TipoAmonestacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class TipoAmonestacionController extends Controller
{
    public function __construct(){
        $this->titulo = 'Amonestacion';
        $this->agregar = 'amonestacion.create';
        $this->guardar = 'amonestacion.store';
        $this->editar ='amonestacion.edit';
        $this->actualizar = 'amonestacion.update';
        $this->borrar ='amonestacion.destroy';
        $this->buscar = 'buscaramonestacion';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amonestacion = TipoAmonestacion::paginate(10);
        return view('precargas.index',['precargas'=>$amonestacion, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        TipoAmonestacion::create($request->all());
        Alert::success('Información Agregada', 'Se ha registrado correctamente la información');
        return redirect()->route('amonestacion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TipoAmonestacion $amonestacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoAmonestacion $amonestacion)
    {
        return view('precargas.edit',['precarga'=>$contrato, 'titulo'=>$this->titulo,'actualizar'=>$this->actualizar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoAmonestacion $amonestacion)
    {
        $amonestacion->update($request->all());
        Alert::success('Información actualizada', 'Se ha actualizado correctamente la información');
        return redirect()->route('amonestacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoAmonestacion $amonestacion)
    {
        $amonestacion->delete();
        Alert::success('Información eliminada', 'Se ha eliminado correctamente la información');
        return redirect()->route('amonestacion.index');
    }

    public function buscar(Request $request){
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        $tipoBaja = TipoAmonestacion::where(function ($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                $q->orWhere('nombre','LIKE',"%$word%")
                    ->orWhere('descripcion','LIKE',"%$word%");
            }
        })->paginate(50);
        return view('precargas.index',['precargas'=>$tipoBaja, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
    }

    public function getTipoAmonestacion(){
        $amonestacion = TipoAmonestacion::get();
        return view('precargas.select',['precargas'=>$amonestacion]);
    }
}
