<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoFalta extends Model
{
    //
    protected $fillable=['id','empleado_id','fecha','comentarios','problema','tipofalta','reporto'];
    
    public $sortable=['id','fecha','tipofalta','reporto','problema'];
    
    protected $hidden=['created_at','updated_at'];
    
    public function empleado(){
    	return $this->belongsTo('App\Empleado','empleado_id');
    }
}
