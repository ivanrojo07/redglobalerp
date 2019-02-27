<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteCobranza extends Model
{
    use SoftDeletes;
    //
    protected $table= "cliente_cobranzas";
    protected $fillable=[
    	'nombre',
    	'puesto',
    	'telefono_cobro',
    	'correo',
    	'dia_revision_factura',
    	'dia_pago',
    ];

     protected $hidden=['created_at','updated_at'];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function cliente()
    {
    	return $this->belongsTo('App\Cliente','cliente_id');
    }
}
