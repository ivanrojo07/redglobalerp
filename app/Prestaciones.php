<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Prestaciones extends Model
{
    use SoftDeletes;
    protected $table = 'prestaciones';
    protected $fillable=['id','nombre','descripcion'];
    protected $hidden=[ 'created_at', 'updated_at','deleted_at'];

    protected $dates = ['deleted_at'];

    public function datosLab(){
    	return $this->hasMany('App\EmpleadoDatosLab');
    }
}
