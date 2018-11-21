<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoAccidente extends Model
{
    //
    protected $fillable=[
    	'fecha',
    	'nombre',
    	'lugar',
    	'comentarios'
    ];

    protected $hidden = [
    	'created_at',
    	'updated_at'
    ];

    public function empleado()
    {
    	return $this->belongsTo('App\Empleado');
    }
}
