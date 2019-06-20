<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoPrestamo extends Model
{
	protected $fillable=[
    	'id',
    	'empleado_id',
    	'fecha',
    	'monto',
    	'numero_pagos',
    	'motivo',
    	'descuento_nomina',
    	'imagen_talon'
    ];
    protected $hidden=[
    	'crated_at',
    	'updated_at'
    ];
    
    public function empleado()
    {
    	return $this->belongsTo('App\Empleado','empleado_id');
    }
}
