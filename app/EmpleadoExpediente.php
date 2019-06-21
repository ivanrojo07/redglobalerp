<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoExpediente extends Model
{
	protected $table = "empleado_expediente";
	protected $fillable=[
    	'id',
    	'empleado_id',
    	'hoja_palco',
    	'identificacion',
    	'comprobante_domicilio',
    	'curp',
    	'rfc',
    	'acta_nacimiento',
    	'imss',
    	'contrato'
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
