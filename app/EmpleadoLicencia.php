<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoLicencia extends Model
{
    //
	protected $fillable=[
		'tipo_licencia_id',
		'vencimiento',
		'vehiculos',
		'experiencia'
	];

	protected $hidden=[
		'created_at',
		'updated_at'
	];

	public function tipo()
	{
		return $this->belongsTo('App\TipoLicencia', 'tipo_licencia_id');
	}

	public function empleado()
	{
		return $this->belongsTo('App\Empleado');
	}

}
