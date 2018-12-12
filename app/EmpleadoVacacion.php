<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoVacacion extends Model
{
    //
    protected $fillable=['id','empleado_id','fechainicio','fechafin','diasdisfrutar'];
    protected $hidden=['created_at','updated_at'];
    

    public function empleado(){
    	return $this->belongsTo('App\Empleado','empleado_id');
    }
}
