<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ClienteResetPasswordNotification;
use App\Notifications\ClienteCredentialNotification;

class ClienteCredential extends Authenticatable
{
    use Notifiable;

    protected $guard = "cliente";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function cliente()
    {
        return $this->hasOne('App\Cliente');
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ClienteResetPasswordNotification($token));
    }
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendCredentialNotification($contrasena)
    {
        // dd($this);
        $this->notify(new ClienteCredentialNotification($this, $contrasena));
    }
}
