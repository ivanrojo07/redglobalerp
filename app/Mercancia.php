<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mercancia extends Model
{
	use SoftDeletes;
    //

    protected $fillable=[
    	'nombre',
    	'line1_origen',
        'line2_origen',
        'cp_origen',
        'line1_destino',
    	'line2_destino',
    	'cp_destino',
    	'naturaleza',
    	'alto',
    	'ancho',
    	'profundo',
    	'medidas',
    	'peso_br',
    	'medida_peso',
    	'bultos',
    	'peso_total',
    	'volumen_total',
    	'tipo_servicio',
    	'observaciones'
    ];
    protected $hidden=[
    	'created_at',
    	'updated_at'
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function cotizacion()
    {
        return $this->belongsTo('App\Cotizacion');
    }
    public function servicios (){
        return $this->belongsToMany('App\Servicio');
    }
}
