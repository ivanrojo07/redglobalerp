<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ClienteCredentialNotification extends Notification
{
    use Queueable;

    public $cliente;
    public $contrasena;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($cliente, $contrasena)
    {
        //
        $this->cliente = $cliente;
        $this->contrasena = $contrasena;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Recibio este correo porque se creo una nueva cuenta para usar los servicios de Red Global Cargo.')
                    ->line('Usuario: '.$this->cliente->name)
                    ->line('Correo electronico: '.$this->cliente->email)
                    ->line('Contraseña: '.$this->contrasena)
                    ->action('Entrar a tu portal', url('/client'))
                    ->line('Gracias por interesarse en los servicios de Red Global Cargo.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
