<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteLegal extends Model
{
    use SoftDeletes;
    //
    protected $table= "cliente_legals";
    protected $fillable=[
    	'nombre_l',
    	'firma',
    	'rfc',
    	'fecha_l',
    ];
    protected $hidden=[
        'created_at',
        'updated_at'
    ];
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
