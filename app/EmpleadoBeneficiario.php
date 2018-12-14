<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoBeneficiario extends Model
{
    //

    protected $fillable=[
    	'nombre',
    	'appaterno',
    	'apmaterno',
    	'parentesco',
    	'rfc',
    	'calle',
    	'num_ext',
    	'num_int',
    	'colonia',
    	'municipio',
    	'estado',
    	'telefono',
    	'unidad_medica',
    	'turno_atencion'
    ];
    protected $hidden=[
    	'created_at',
    	'updated_at'
    ];

    public function empleado()
    {
    	return $this->belongsTo('App\Empleado');
    }
}
