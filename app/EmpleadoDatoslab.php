<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoDatoslab extends Model
{
    //
     protected $table='empleado_datoslabs';
    protected $fillable=['id',
                         'empleado_id',
                         'fechacontratacion',
                         'fechaactualizacion',
                         'contrato_id',
                         'puesto_id',
                         'salarionom',
                         'salariodia',
                         'periodopaga',
                         'prestaciones',
                         'regimen',
                         'hentrada',
                         'hsalida',
                         'hcomida',
                         'lugartrabajo',
                         'banco',
                         'cuenta',
                         'clabe',
                         'fechabaja',
                         'tipobaja_id',
                         'comentariobaja',
                         'bonopuntualidad',
                     ];
        
    protected $hidden=['created_at','updated_at'];
    public $sortable=['id'];

    public function empleado(){
    	return $this->belongsTo('App\Empleado');
    }

    public function tipocontrato(){
    	return $this->belongsTo('App\TipoContrato','contrato_id');
    }

    public function tipobaja(){
    	return $this->belongsTo('App\TipoBaja');
    }

    public function tipopuesto(){ 
        return $this->belongsTo('App\TipoPuesto','puesto_id');
    }

}
