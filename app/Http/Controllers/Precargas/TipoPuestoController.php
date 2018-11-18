<?php

namespace App\Http\Controllers\Precargas;

use App\TipoPuesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class TipoPuestoController extends Controller
{
    public function __construct(){
        $this->titulo = 'Tipo de Puesto';
        $this->agregar = 'puestos.create';
        $this->guardar = 'puestos.store';
        $this->editar ='puestos.edit';
        $this->actualizar = 'puestos.update';
        $this->borrar ='puestos.destroy';
        $this->buscar = 'buscarpuesto';
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
        $puestos = TipoPuesto::paginate(10);
        return view('precargas.index',['precargas'=>$puestos, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
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
        TipoPuesto::create($request->all());
        Alert::success('Puesto guardado');
        return redirect()->route('puestos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoPuesto  $tipopuesto
     * @return \Illuminate\Http\Response
     */
    public function show(TipoPuesto $puesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoPuesto  $TipoPuesto
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoPuesto $puesto)
    {
        //
        return view('precargas.edit',['precarga'=>$puesto, 'titulo'=>$this->titulo,'actualizar'=>$this->actualizar]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoPuesto  $TipoPuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoPuesto $puesto)
    {
        //
        $puesto->update($request->all());
        Alert::success('Puesto actualizado');
        return redirect()->route('puestos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoPuesto  $TipoPuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoPuesto $puesto)
    {
        //
        $puesto->delete();
        Alert::error('Puesto eliminado');
        return redirect()->route('puestos.index');
    }
    public function buscar(Request $request){
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        $tipoBaja = TipoPuesto::where(function ($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                $q->orWhere('nombre','LIKE',"%$word%")
                    ->orWhere('descripcion','LIKE',"%$word%");
            }
        })->paginate(50);
        return view('precargas.index',['precargas'=>$tipoBaja, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
    }

    public function getpuestos(){
        $puestos = TipoPuesto::get();
        return view('precargas.select',['precargas'=>$puestos]);
    }
}
