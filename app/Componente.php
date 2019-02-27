<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Componente extends Model
{
    use SoftDeletes;
    //
     protected $table = 'componentes';

    protected $fillable = [
    	'id',
    	'modulo_id',
    	'nombre'
    ];

    protected $hidden = ['created_at', 'updated_at'];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    public function modulo() {
        return $this->belongsTo('App\Modulo');
    }

    public function perfils() {
        return $this->belongsToMany('App\Perfil');
    }
}
