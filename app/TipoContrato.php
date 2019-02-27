<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TipoContrato extends Model
{
    //
    use SoftDeletes;

    protected $table = 'tipo_contratos';
    protected $fillable=['id','nombre','descripcion'];
    protected $hidden=['created_at','updated_at'];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    public function datosLab(){
    	return $this->hasMany('App\EmpleadoDatosLab');
    }
}
