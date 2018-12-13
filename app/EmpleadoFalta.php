<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoFalta extends Model
{
    //
    protected $fillable=['id','empleado_id','fecha','tipofalta','motivo'];
    
    protected $hidden=['created_at','updated_at'];
    
    public function empleado(){
    	return $this->belongsTo('App\Empleado','empleado_id');
    }
}
