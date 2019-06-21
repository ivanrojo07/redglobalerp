<?php

namespace App\Http\Controllers\Cliente;
use App\Cotizacion;
use App\Mercancia;
use App\Cliente;
use App\Prospecto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class ProspectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prospectos=Prospecto::paginate(10);
        return view('cliente.prospectos.index',['prospectos'=>$prospectos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.prospectos.create');
    }

    public function addCotizacion(Prospecto $prospecto)
    {        
        return view('cliente.prospectos.add',['prospecto'=>$prospecto]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cotizacion=new Cotizacion([
                'responsable'=>$request->responsable,
                'telefono'=>$request->telefono,
                'correo'=>$request->correo,
                 'line1_origen'=>$request->linea1_origen,                
                'cp_origen'=>$request->cp_origen,
                'line1_destino'=>$request->linea1_destino,                
                'cp_destino'=>$request->cp_destino,
                'tipo_servicio'=>$request->tipo_servicio,
                'eta'=>$request->eta           
            ]);
        $prospecto=new Prospecto([
                'razon_social'=>$request->razon_social,
                'telefono'=>$request->telefono,
                'celular'=>$request->celular,
                'correo'=>$request->correo
            ]);
        $prospecto->save();
        $cotizacion->prospecto_id=$prospecto->id;                
        $cotizacion->save();
        foreach ($request->nombre as $key => $nombre) {
            //dd($request->despacho_aduanal[$key]);
            $mercancia= new Mercancia([

                'nombre'=>$nombre,
                // 'line1_origen'=>$request->linea1_origen[$key],                
                // 'cp_origen'=>$request->cp_origen[$key],
                // 'line1_destino'=>$request->linea1_destino[$key],                
                // 'cp_destino'=>$request->cp_destino[$key],
                'naturaleza'=>$request->naturaleza[$key],
                'alto'=>$request->alto[$key],
                'ancho'=>$request->ancho[$key],
                'profundo'=>$request->profundo[$key],
                'medidas'=>$request->medidas[$key],
                'peso_br'=>$request->peso_br[$key],
                'medida_peso'=>$request->medida_peso[$key],
                'bultos'=>$request->bultos[$key],
                'peso_total'=>$request->peso_total[$key],
                'volumen_total'=>$request->volumen_total[$key],
                // 'tipo_servicio'=>$request->tipo_servicio[$key],
                'observaciones'=>$request->observaciones[$key],
                // 'eta'=>$request->eta[$key],
                // 'peligroso_clase'=>$request->peligroso_clase[$key],
                // 'peligroso_nu'=>$request->peligroso_nu[$key]
            ]);
            if($request->despacho_aduanal) 
            {
                $cotizacion->despacho_aduanal=true;
            } 
            else
            {
                $cotizacion->despacho_aduanal=false;
            }
            $mercancia->cotizacion_id=$cotizacion->id;
            $mercancia->save();
            // $mercancia->nombre = $nombre;
            // $mercancia->naturaleza = $request->naturaleza[$key];
            // $mercancia->tipo_servicio=$request->tipo_servicio[$key];
            // $mercancia->linea1_origen=$request->linea1_origen[$key];
            // $mercancia->cp_origen = $request->cp_origen[$key];
            // array_push($cotizacion,$mercancia);
            // var_dump($nombre);
            
        }
        return $this->index();
    }

    public function pushCotizacion(Request $request,Prospecto $prospecto)
    {        
        $cotizacion=new Cotizacion([
                'responsable'=>$request->responsable,
                'telefono'=>$request->telefono,
                'correo'=>$request->correo,
                 'line1_origen'=>$request->linea1_origen,                
                'cp_origen'=>$request->cp_origen,
                'line1_destino'=>$request->linea1_destino,                
                'cp_destino'=>$request->cp_destino,
                'tipo_servicio'=>$request->tipo_servicio,
                'eta'=>$request->eta

            ]);
        $cotizacion->prospecto_id=$prospecto->id;                
        $cotizacion->save();
        foreach ($request->nombre as $key => $nombre) {
            //dd($request->despacho_aduanal[$key]);
            $mercancia= new Mercancia([

                'nombre'=>$nombre,
                // 'line1_origen'=>$request->linea1_origen[$key],                
                // 'cp_origen'=>$request->cp_origen[$key],
                // 'line1_destino'=>$request->linea1_destino[$key],                
                // 'cp_destino'=>$request->cp_destino[$key],
                'naturaleza'=>$request->naturaleza[$key],
                'alto'=>$request->alto[$key],
                'ancho'=>$request->ancho[$key],
                'profundo'=>$request->profundo[$key],
                'medidas'=>$request->medidas[$key],
                'peso_br'=>$request->peso_br[$key],
                'medida_peso'=>$request->medida_peso[$key],
                'bultos'=>$request->bultos[$key],
                'peso_total'=>$request->peso_total[$key],
                'volumen_total'=>$request->volumen_total[$key],
                // 'tipo_servicio'=>$request->tipo_servicio[$key],
                'observaciones'=>$request->observaciones[$key],
                // 'eta'=>$request->eta[$key]
            ]);
            if($request->despacho_aduanal[$key]) 
            {
                $mercancia->despacho_aduanal=true;
            } 
            else
            {
                $mercancia->despacho_aduanal=false;
            }
            $mercancia->cotizacion_id=$cotizacion->id;
            $mercancia->save();
        }

        return $this->show($prospecto->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $prospecto=Prospecto::find($id);
        //dd($prospecto);        
        return view('cliente.cotizacion.index',['cotizaciones'=>$prospecto->cotizacions,'prospecto'=>$prospecto]);
    }

    public function showCotizacion(Prospecto $prospecto, Cotizacion $cotizacion)
    {
         return view('cliente.cotizacion.show',['cotizacion'=>$cotizacion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cotizacion=Cotizacion::find($id);
        return view('cliente.prospectos.edit',['cotizacion'=>$cotizacion]);
        dd($cotizacion);
    }

    public function editCotizacion(Prospecto $prospecto, Cotizacion $cotizacion)
    {        
        return view('cliente.prospectos.edit',['cotizacion'=>$cotizacion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateCotizacion(Request $request,Cotizacion $cotizacion)
    {
        $cotizacion_nueva=new Cotizacion([
                'responsable'=>$request->responsable,
                'telefono'=>$request->telefono,
                'correo'=>$request->correo                
            ]);
        $cotizacion_nueva->prospecto_id=$cotizacion->prospecto_id;        
        $cotizacion_nueva->folio_consecutivo=$this->Folio($cotizacion->folio_consecutivo,$cotizacion->id);        
        $cotizacion_nueva->save();


        foreach ($request->nombre as $key => $nombre) {            
            $mercancia= new Mercancia([

                'nombre'=>$nombre,
                'line1_origen'=>$request->linea1_origen[$key],                
                'cp_origen'=>$request->cp_origen[$key],
                'line1_destino'=>$request->linea1_destino[$key],                
                'cp_destino'=>$request->cp_destino[$key],
                'naturaleza'=>$request->naturaleza[$key],
                'alto'=>$request->alto[$key],
                'ancho'=>$request->ancho[$key],
                'profundo'=>$request->profundo[$key],
                'medidas'=>$request->medidas[$key],
                'peso_br'=>$request->peso_br[$key],
                'medida_peso'=>$request->medida_peso[$key],
                'bultos'=>$request->bultos[$key],
                'peso_total'=>$request->peso_total[$key],
                'volumen_total'=>$request->volumen_total[$key],
                'tipo_servicio'=>$request->tipo_servicio[$key],
                'observaciones'=>$request->observaciones[$key],
                'eta'=>$request->eta[$key]
            ]);
            if($request->despacho_aduanal[$key]) 
            {
                $mercancia->despacho_aduanal=true;
            } 
            else
            {
                $mercancia->despacho_aduanal=false;
            }
            $mercancia->cotizacion_id=$cotizacion_nueva->id;
            $mercancia->save();
        }
        return $this->showCotizacion($cotizacion_nueva->prospecto,$cotizacion_nueva);
    }

    public function VerificarFolio($folio_final,$id)
    {
        $comparar=Cotizacion::where('folio_consecutivo',$folio_final)->get();        
        if(sizeof($comparar))
        {           
            return $this->Folio($folio_final,$id); 
        }
        else
        {
            return $folio_final;
        }
    }

    public function Folio($folio_consecutivo,$id)
    {        
        if($folio_consecutivo)
        {
            
            $num=substr(''.$folio_consecutivo.'',0,-1);            
            $folio=ord(substr(''.$folio_consecutivo.'',-1));
            $folioFinal=$num.chr($folio+1);            
        }
        else
        {
            $folioFinal=''.$id.'A';
        }       
       return $this->VerificarFolio($folioFinal, $id);
    }
    //ESTA FUNCIONA Y ES EL RESPALDO
    // public function Folio($folio_consecutivo,$id)
    // {
    //     $prueba=Cotizacion::where('folio_consecutivo',$cotizacion->folio_consecutivo)->get();
    //     if($folio_consecutivo)
    //     {
            
    //         $id=substr(''.$folio_consecutivo.'',0,-1);            
    //         $folio=ord(substr(''.$folio_consecutivo.'',-1));
    //         return $id.chr($folio+1);            
    //     }
    //     else
    //     {
    //         return ''.$id.'A';
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hacerCliente(Prospecto $prospecto)
    {
        $edit = false;
        $tipo = null;
        $cliente = new Cliente;
        return view('cliente.prospectos.cliente',['edit'=>$edit,'tipo_cliente'=>$tipo,'prospecto'=>$prospecto]);
    }

    public function form(Prospecto $prospecto,$tipo)
    {
        //dd($prospecto);
        $edit = false;
        $cliente = new Cliente;
        App::setLocale('es');
        if($tipo === "extranjero_ing"){
            App::setLocale('en');
        }
        return view('cliente.prospectos.cliente',['edit'=>$edit,'tipo_cliente'=>$tipo,'cliente'=>$cliente,'prospecto'=>$prospecto]);
        // dd(__('Datos generales'));
    }

    public function cliente(Prospecto $prospecto, Request $request)
    {
        //dd($prospecto);
        app('App\Http\Controllers\Cliente\ClienteController')->store($request);
        //$cliente->store($request);
        $cliente=Cliente::get()->last();
        foreach ($prospecto->cotizacions as $cotizacion) {
            $cotizacion->prospecto_id=null;
            $cotizacion->cliente_id=$cliente->id;
            $cotizacion->save();
        }
        $prospecto->delete();        
        return $this->index();
    }

    //public function storeCliente(Request $requ)

    public function destroy($id)
    {
        
    }
}
