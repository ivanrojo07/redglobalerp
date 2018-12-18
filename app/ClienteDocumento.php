<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteDocumento extends Model
{
    //
    protected $table="cliente_documentos";
    protected $fillable=[
    	'cif_tax_nit_rut',
    	'comp_dom',
    	'acta_constitutiva',
    	'identificacion_rep_legal',
    	'carta_poder'
    ];
    public function cliente(){
    	return $this->belongsTo('App\Cliente','cliente_id');
    }

}
