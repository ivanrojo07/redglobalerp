<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmpleadoDatoslab extends Model
{
    use SoftDeletes;
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
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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
