<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $fillable=[
    	'nombre',
    	'alto',
    	'ancho',
    	'profundo',
    	'medidas',
    	'naturaleza',
    	'peso_br',
    	'medida_peso',
    	'bultos',
    	'origen',
    	'destino',
    	'peso_total',
    	'volumen_total',
    	'observaciones'
    ];
    protected $hidden=[
    	'created_at',
    	'updated_at'
    ];

    public function proyecto()
    {
    	return $this->belongsTo('App\Proyecto');
    }
}
