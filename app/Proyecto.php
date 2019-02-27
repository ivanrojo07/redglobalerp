<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    //
    protected $fillable=[
    	'nombre',
    	'responsable',
    	'telefono',
    	'correo'
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

    public function productos()
    {
    	return $this->hasMany('App\Producto');
    }

    public function cliente()
    {
    	return $this->belongsTo('App\Cliente');
    }
}
