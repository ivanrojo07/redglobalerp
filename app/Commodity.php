<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commodity extends Model
{
	use SoftDeletes;
    //

    protected $fillable=[
    	'nombre',
    	'descripcion'
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
}
