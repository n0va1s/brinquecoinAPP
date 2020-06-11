<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBoard extends Notification
{
    use Queueable;

    protected $link;
    protected $type;
    protected $person;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(String $link, String $type, String $person)
    {
        $this->link = $link;
        $this->type = $type;
        $this->person = $person;
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
            ->from('contato@brinquecoin.com', 'Brinque Coin')
            ->subject('Novo quadro de '.$this->type.' para '.$this->person)
            ->markdown(
                'mail.newBoard',
                [
                    'name' => $this->person,
                    'type' => $this->type,
                    'link' => $this->link,
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
            'title' => 'Novo quadro de '.$this->type.' para '.$this->person,
            'date'  => now(),
        ];
    }
}
