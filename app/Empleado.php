<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    //
    

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'empleados';

    protected $fillable=[
    	'identificador',
    	'nombre',
    	'appaterno',
    	'apmaterno',
    	'email',
    	'tipo',
    	'rfc',
    	'telefono',
    	'movil',
    	'nss',
    	'curp',
    	'infonavit',
    	'fnac',
    	'cp',
    	'calle',
    	'numext',
    	'numint',
    	'colonia',
    	'municipio',
    	'estado',
    	'calles',
    	'referencia'
    ];

    protected $hidden =[
    	'created_at',
    	'updated_at'
    ];

    public function user() {
        return $this->hasOne('App\User');
    }
}
