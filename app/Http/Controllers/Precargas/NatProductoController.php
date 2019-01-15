<?php

namespace App\Http\Controllers\Precargas;

use App\NatProducto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class NatProductoController extends Controller
{
    public function __construct() {
        $this->titulo = 'Tipo de naturaleza del producto';
        $this->agregar = 'nat_productos.create';
        $this->guardar = 'nat_productos.store';
        $this->editar ='nat_productos.edit';
        $this->actualizar = 'nat_productos.update';
        $this->borrar ='nat_productos.destroy';
        $this->buscar = 'buscarnat_producto';
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
        $nat_producto = NatProducto::paginate(10);
        return view('precargas.index',['precargas'=>$nat_producto, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
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
        NatProducto::create($request->all());
        Alert::success('Información Agregada', 'Se ha registrado correctamente la información');
        return redirect()->route('nat_productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NatProducto  $NatProducto
     * @return \Illuminate\Http\Response
     */
    public function show(NatProducto $NatProducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NatProducto  $NatProducto
     * @return \Illuminate\Http\Response
     */
    public function edit(NatProducto $nat_producto)
    {
        //
        // dd($nat_producto);
        return view('precargas.edit',['precarga'=>$nat_producto, 'titulo'=>$this->titulo,'actualizar'=>$this->actualizar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NatProducto  $NatProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NatProducto $nat_producto)
    {
        //
        $nat_producto->update($request->all());
        Alert::success('Información actualizada', 'Se ha actualizado correctamente la información');
        return redirect()->route('nat_productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NatProducto  $NatProducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(NatProducto $nat_producto)
    {
        //
        $nat_producto->delete();
        Alert::success('Información eliminada', 'Se ha eliminado correctamente la información');
        return redirect()->route('nat_productos.index');
    }
    public function buscar(Request $request){
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        $NatProducto = NatProducto::where(function ($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                $q->orWhere('nombre','LIKE',"%$word%")
                    ->orWhere('descripcion','LIKE',"%$word%");
            }
        })->paginate(50);
        return view('precargas.index',['precargas'=>$NatProducto, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo,'buscar'=>$this->buscar]);
    }

     public function getnat_producto(){
        $nat_producto = NatProducto::get();
        return view('precargas.select',['precargas'=>$nat_producto]);
    }
}
