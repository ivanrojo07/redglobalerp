<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoDisciplina extends Model
{
    //
    protected $fillable=[
    	'fecha',
    	'tipoindisciplina',
    	'motivo'
    ];
    protected $hidden= [
    	'created_at',
    	'updated_at'
    ];
    public function empleado()
    {
    	return $this->belongsTo('App\Empleado');
    }
    public function getIndisciplinaAttribute()
    {
        $indisciplina = $this->tipoindisciplina;
        if ($indisciplina == "retardo") {
            return "Retardo";
        }
        elseif ($indisciplina == "retardo_jus") {
            return "Retardo justificado";
        }
        elseif($indisciplina == "amonestacion_verb"){
            return "Amonestación verbal";
        }
        elseif($indisciplina =="amonestacion_escr"){
            return "Amonestación escrita";
        }
        elseif($indisciplina == "suspension"){
            return "Suspensión de labores";
        }
        elseif($indisciplina == "rescicion"){
            return "Rescición de contrato";
        }
        else{
            return "este dato es invalido, contacte con soporte tecnico";
        }
    }
}
