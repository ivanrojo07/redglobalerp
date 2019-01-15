<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteContacto extends Model
{
    //
    protected $fillable=[
    	'nombre',
    	'appat',
    	'apmat',
    	'area',
    	'puesto',
    	'telofi',
    	'ext',
    	'correoofi',
    	'telefono',
    	'correo',
    	'celular',
    	'observaciones'
    ];
    protected $hidden=[
    	'created_at',
    	'updated_at'
    ];

    public function cliente()
    {
    	return $this->belongsTo('App\Cliente');
    }
}
