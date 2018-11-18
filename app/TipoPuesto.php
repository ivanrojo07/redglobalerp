<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TipoPuesto extends Model
{
    //
    use SoftDeletes;
    protected $table = 'tipo_puestos';
    protected $fillable=['id','nombre','descripcion'];
    protected $hidden=[ 'created_at', 'updated_at','deleted_at'];
    public $sortable=['id','nombre', 'descripcion'];

    public function datosLab(){
    	return $this->hasMany('App\EmpleadoDatosLab');
    }
}
