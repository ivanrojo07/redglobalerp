<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteFiscal extends Model
{

    use SoftDeletes;
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
