<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class OpenCapsule extends Notification
{
    use Queueable;
    protected $createdAt;
    protected $fromName;
    protected $toName;
    protected $message;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        String $createdAt,
        String $fromName,
        String $toName,
        String $description
    ) {
        $this->createdAt = $createdAt;
        $this->fromName = $fromName;
        $this->toName = $toName;
        $this->description = $description;
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
        Log::info('##BRINQUECOIN## [CAPSULA ENVIADA]');

        return (new MailMessage)
            ->from('contato@brinquecoin.com', 'Brinque Coin')
            ->subject('Chegou o dia de abrir sua cápsula do tempo')
            ->markdown(
                'mail.openCapsule',
                [
                    'createdAt'     => $this->createdAt,
                    'fromName'      => $this->fromName,
                    'toName'        => $this->toName,
                    'description'   => $this->description,
                    'image'         => env('APP_URL', 'https://app.brinquecoin.com').'/img/brinquecoin.png',
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
            'title' => 'Chegou o dia de abrir sua cápsula do tempo',
            'date'  => now(),
        ];
    }
}
