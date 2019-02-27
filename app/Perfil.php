<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perfil extends Model
{
    use SoftDeletes;
    
    protected $table="perfils";

    protected $fillable=[
    	'id',
    	'nombre'
    ];
    protected $hidden=[
    	'created_at',
    	'updated_at'
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function componentes()
    {
    	return $this->belongsToMany('App\Componente');
    }

    public function users()
    {
    	return $this->hasMany('App\User');
    }
}
