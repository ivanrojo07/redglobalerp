<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoLicencia extends Model
{
    //
    use SoftDeletes;

    protected $fillable=['id','nombre','descripcion'];
    protected $hidden=['created_at','updated_at'];
    public $sortable=['id','nombre','descripcion'];

    public function licencia(){
    	return $this->hasMany('App\EmpleadoLicencia', 'tipo_licencia_id');
    }
}
