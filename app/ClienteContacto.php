<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteContacto extends Model
{
    use SoftDeletes;
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
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function cliente()
    {
    	return $this->belongsTo('App\Cliente');
    }
}
