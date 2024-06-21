<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DataChangeEmailNotification extends Notification
{
    use Queueable;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return $this->getMessage();
    }

    public function getMessage()
    {
        return (new MailMessage)
            ->subject('Barber Shop: Informacion ' . $this->data['action'] . ' en un ' . $this->data['model_name'])
            ->greeting('Hola,')
            ->line('nos gustaria informarle que en un ' . $this->data['model_name'] . ' la informacion fue ' . $this->data['action'])
            ->line('Por favor, inicie sesion para ver mas informacion.')
            ->action('Haga Click', 'http://127.0.0.1:8000/login')
            ->line('Saludos!')
            ->line('Barber Shop Team')
            ->salutation(' ');
    }
}
