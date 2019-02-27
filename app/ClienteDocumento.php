<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteDocumento extends Model
{
    use SoftDeletes;
    //
    protected $table="cliente_documentos";
    protected $fillable=[
    	'cif_tax_nit_rut',
    	'comp_dom',
    	'acta_constitutiva',
    	'identificacion_rep_legal',
    	// 'carta_poder'
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


    public function cliente(){
    	return $this->belongsTo('App\Cliente','cliente_id');
    }

}
