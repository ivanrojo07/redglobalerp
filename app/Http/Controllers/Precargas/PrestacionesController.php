<?php

namespace App\Http\Controllers\Precargas;

use App\Prestaciones;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class PrestacionesController extends Controller
{
    public function __construct(){
        $this->titulo = 'Prestaciones';
        $this->agregar = 'prestaciones.create';
        $this->guardar = 'prestaciones.store';
        $this->editar ='prestaciones.edit';
        $this->actualizar = 'prestaciones.update';
        $this->borrar ='prestaciones.destroy';
        $this->buscar = 'buscarprestaciones';
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
        $prestaciones = Prestaciones::paginate(10);
        return view('precargas.index',['precargas'=>$prestaciones, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
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
        Prestaciones::create($request->all());
        Alert::success('Información Agregada', 'Se ha registrado correctamente la información');
        return redirect()->route('prestaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Prestaciones $prestaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestaciones $prestaciones)
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
    public function update(Request $request, Prestaciones $prestaciones)
    {
        $prestaciones->update($request->all());
        Alert::success('Información actualizada', 'Se ha actualizado correctamente la información');
        return redirect()->route('prestaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestaciones $prestaciones)
    {
        $prestaciones->delete();
        Alert::success('Información eliminada', 'Se ha eliminado correctamente la información');
        return redirect()->route('prestaciones.index');
    }

    public function buscar(Request $request){
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        $tipoBaja = Prestaciones::where(function ($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                $q->orWhere('nombre','LIKE',"%$word%")
                    ->orWhere('descripcion','LIKE',"%$word%");
            }
        })->paginate(50);
        return view('precargas.index',['precargas'=>$tipoBaja, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
    }

    public function getPrestaciones(){
        $prestaciones = Prestaciones::get();
        return view('precargas.select',['precargas'=>$prestaciones]);
    }
}
