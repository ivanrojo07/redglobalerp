<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TipoAmonestacion extends Model
{
    use SoftDeletes;
    protected $table = 'tipo_amonestacions';
    protected $fillable=['id','nombre','descripcion'];
    protected $hidden=[ 'created_at', 'updated_at','deleted_at'];

    protected $dates = ['deleted_at'];

    public function datosDisciplina(){
    	return $this->hasMany('App\EmpleadoDisciplina');
    }
}
