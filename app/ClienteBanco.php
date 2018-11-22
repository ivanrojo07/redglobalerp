<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteBanco extends Model
{
    //
    protected $table= "cliente_bancos";
    protected $fillable=[
    	'nombre_b',
    	'plaza',
    	'sucursal',
    	'cuenta',
    	'clave_int_trans',
    	'aba',
    	'swift',
    	'rfc_banco',
    	'clabe_inter',
    	'metodo_pago',
    	'forma_pago',
    	'uso_cfdi'
    ];

    public function cliente()
    {
    	return $this->belongsTo('App\Cliente','cliente_id');
    }
}
