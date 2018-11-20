<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoVacacion extends Model
{
    //
    protected $fillable=['id','empleado_id','fechainicio','fechafin','diastomados','diasrestantes','periodo1','periodo2','diastotal'];
    protected $hidden=['created_at','updated_at'];
    public $sortable=['id','fechainicio','fechafin','diastomados','diasrestantes','diastotal','created_at'];

    public function empleado(){
    	return $this->belongsTo('App\Empleado','empleado_id');
    }
}
