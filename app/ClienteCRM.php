<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteCRM extends Model
{
    //
    protected $table="crm";


    protected $fillable=[
    	'fecha_cont',
    	'fecha_sig',
    	'forma_cont',
    	'servicio',
    	'telefono',
    	'ext',
    	'correo',
    	'celular',
    	'comentario',
    	'acuerdos'
    ];

    protected $hidden=[
    	'created_at',
    	'updated_at'
    ];

    public function cliente()
    {
    	return $this->morphTo();
    }
}
