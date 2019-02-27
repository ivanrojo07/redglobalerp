<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmpleadoLicencia extends Model
{
	use SoftDeletes;
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
	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

	public function tipo()
	{
		return $this->belongsTo('App\TipoLicencia', 'tipo_licencia_id');
	}

	public function empleado()
	{
		return $this->belongsTo('App\Empleado');
	}

}
