<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteBanco extends Model
{
    //
    use SoftDeletes;
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
