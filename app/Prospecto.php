<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospecto extends Model
{
	 protected $fillable = [
    	'razon_social',
    	'telefono',
    	'celular',
    	'correo'
    ];

    protected $hidden=['created_at','updated_at'];

    public function cotizacions(){
        return $this->hasMany('App\Cotizacion');
    }
}
