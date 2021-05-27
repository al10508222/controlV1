<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetRequest extends Notification implements ShouldQueue
{
    use Queueable;
    
    protected $token;
    protected $email;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token,$email)
    {
      $this->token = $token;
      $this->email = $email;
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
      $url = url(env('APP_URL', 'localhost:8080').'/reset?token='.$this->token.'&email='.$this->email);
        return (new MailMessage)
          ->subject('Restablecer Contraseña')
          ->greeting('¡Hola!')
          ->line('Recibiste este correo electrónico porque se recibió una solicitud de restablecimiento de contraseña para tu cuenta.')
          ->action('Restablecer Contraseña', url($url))
          ->line('
              Si no solicitaste un restablecimiento de contraseña, no se requiere ninguna otra acción.')
          ->salutation('¡Saludos!');
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
