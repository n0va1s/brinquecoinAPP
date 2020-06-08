<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCapsule extends Notification
{
    use Queueable;

    protected $name;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(String $name)
    {
        $this->name = $name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
            ->from(getenv('MAIL_FROM_ADDRESS'), getenv('MAIL_FROM_NAME'))
            ->subject('Sua cápsula do tempo foi criada')
            ->markdown(
                'mail.newCapsule',
                [
                    'name' => $this->name,
                    'url' => 'https://brinquecoin.com.br',
                    'image' => 'https://app.brinquecoin.com/img/brinquecoin.png',
                ]
            );
    }

    /**
     * Get the database representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Sua cápsula do tempo foi criada',
            'date'  => now(),
        ];
    }
}
