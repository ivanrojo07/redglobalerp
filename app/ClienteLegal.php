<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteLegal extends Model
{
    //
    protected $table= "cliente_legals";
    protected $fillable=[
    	'nombre_l',
    	'firma',
    	'rfc',
    	'fecha_l',
    ];

    public function cliente()
    {
    	return $this->belongsTo('App\Cliente','cliente_id');
    }
}
