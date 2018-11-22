<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $fillable = [
    	'tipo_cliente',
    	'razon_social',
    	'giro',
    	'regimen_tributario',
    	'rfc_tax_ruc_nit',
    	'calle',
    	'num_ext',
    	'num_int',
    	'colonia',
    	'alcaldia_ciudad',
    	'estado',
    	'pais',
    	'cp',
    	'residencia',
    	'nacionalidad',
    	'telefono',
    	'email'
    ];
    public function banco()
    {
    	return $this->hasOne('App\ClienteBanco');
    }
    public function cobranza()
    {
    	return $this->hasOne('App\ClienteCobranza');
    }
    public function legal()
    {
    	return $this->hasOne('App\ClienteLegal');
    }
}
