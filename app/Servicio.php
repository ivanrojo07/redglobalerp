<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servicio extends Model
{
	use SoftDeletes;
    //
    protected $fillable=[
    	'nombre',
    	'tipo_servicio',
    	'descripcion'
    ];

    protected $hidden=[
    	'created_at',
    	'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function mercancias()
    {
        return $this->belongsToMany('App\Mercancia');
    }

}
