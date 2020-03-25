<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserCreate extends Notification
{
    use Queueable;
    private $prenom;
    private $password;
    private $email;

    /**
     * Create a new notification instance.
     *
     * @param $prenom
     * @param $email
     * @param $password
     */
    public function __construct($prenom, $email,$password)
    {
        //
        $this->prenom = $prenom;
        $this->password = $password;
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
        return (new MailMessage)
                    ->greeting('Bonjour '.$this->prenom.',')
                    ->line('...')
                    ->line('Email : '. $this->email)
                    ->line('Mot de passe : '. $this->password)
                    ->action('Connectez-vous', url('/login'));
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
