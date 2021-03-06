<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    //
    use SoftDeletes;

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

    protected $hidden=['created_at','updated_at'];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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
    public function documento()
    {
        return $this->hasOne('App\ClienteDocumento');
    }

    public function dirFiscales()
    {
        return $this->hasMany('App\ClienteFiscal');
    }

    public function crms(){
        return $this->morphMany('App\ClienteCRM','cliente');
    }
    public function contactos()
    {
        return $this->hasMany('App\ClienteContacto');
    }

    public function credential(){
        return $thhis->belongsTo('App\ClienteCredential');
    }

    public function cotizacions(){
        return $this->hasMany('App\Cotizacion');
    }

}
