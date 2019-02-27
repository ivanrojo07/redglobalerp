<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteCRM extends Model
{
    use SoftDeletes;
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
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function cliente()
    {
    	return $this->morphTo();
    }
}
