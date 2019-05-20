<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cotizacion extends Model
{
    //
    use SoftDeletes;

    protected $fillable=[
    	'nombre',
    	'responsable',
    	'telefono',
    	'correo',
        //añadido
        'folio_consecutivo',        
        'prospecto_id'
    ];
    protected $hidden = ['created_at', 'updated_at'];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function prospecto()
    {
        return $this->belongsTo('App\Prospecto');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function Empleado()
    {
        return $this->belongsTo('App\Empleado');
    }

    public function mercancias()
    {
        return $this->hasMany('App\Mercancia');
    }

    
}
