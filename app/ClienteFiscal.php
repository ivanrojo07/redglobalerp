<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteFiscal extends Model
{
    //

    protected $fillable=[
    	'nombre',
    	'calle',
    	'numext',
    	'numint',
    	'cp',
    	'colonia',
    	'municipio',
    	'ciudad',
    	'estado',
    	'referencia',
    	'calle1',
    	'calle2'
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
