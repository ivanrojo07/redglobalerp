<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
	protected $table = "oficinas";
	protected $fillable=[
    	'id',
    	'razon_social',
    	'alias',
    	'rfc',
    	'calle',
    	'num_int',
    	'num_ext',
    	'colonia',
    	'cp',
    	'ciudad',
    	'estado',
    	'alcaldia',
    	'responsable',
    	'representante_legal'
    ];
    protected $hidden=[
    	'crated_at',
    	'updated_at'
    ];

    public function empleados()
    {
    	return $this->HasMany('App\Empleado');
    }
}
