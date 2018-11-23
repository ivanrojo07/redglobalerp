<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteCobranza extends Model
{
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

    public function cliente()
    {
    	return $this->belongsTo('App\Cliente','cliente_id');
    }
}
