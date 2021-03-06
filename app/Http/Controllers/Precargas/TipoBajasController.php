<?php

namespace App\Http\Controllers\Precargas;

use App\TipoBaja;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class TipoBajasController extends Controller
{
    public function __construct() {
        $this->titulo = 'Tipo de Baja';
        $this->agregar = 'bajas.create';
        $this->guardar = 'bajas.store';
        $this->editar ='bajas.edit';
        $this->actualizar = 'bajas.update';
        $this->borrar ='bajas.destroy';
        $this->buscar = 'buscarbaja';
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
        $bajas = TipoBaja::paginate(10);
        return view('precargas.index',['precargas'=>$bajas, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
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
        TipoBaja::create($request->all());
        Alert::success('Información Agregada', 'Se ha registrado correctamente la información');
        return redirect()->route('bajas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoBaja  $tipoBaja
     * @return \Illuminate\Http\Response
     */
    public function show(TipoBaja $tipoBaja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoBaja  $tipoBaja
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoBaja $baja)
    {
        //
        // dd($baja);
        return view('precargas.edit',['precarga'=>$baja, 'titulo'=>$this->titulo,'actualizar'=>$this->actualizar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoBaja  $tipoBaja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoBaja $baja)
    {
        //
        $baja->update($request->all());
        Alert::success('Información actualizada', 'Se ha actualizado correctamente la información');
        return redirect()->route('bajas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoBaja  $tipoBaja
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoBaja $baja)
    {
        //
        $baja->delete();
        Alert::success('Información eliminada', 'Se ha eliminado correctamente la información');
        return redirect()->route('bajas.index');
    }
    public function buscar(Request $request){
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        $tipoBaja = TipoBaja::where(function ($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                $q->orWhere('nombre','LIKE',"%$word%")
                    ->orWhere('descripcion','LIKE',"%$word%");
            }
        })->paginate(50);
        return view('precargas.index',['precargas'=>$tipoBaja, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
    }

     public function getBajas(){
        $bajas = TipoBaja::get();
        return view('precargas.select',['precargas'=>$bajas]);
    }
}
