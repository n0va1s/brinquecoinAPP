<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OpenCapsule extends Notification
{
    use Queueable;
    protected $dtCreatedAt;
    protected $nmSender;
    protected $nmRecipient;
    protected $txMessage;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        String $dtCreatedAt,
        String $nmSender,
        String $nmRecipient,
        String $txMessage
    ) {
        $this->dtCreatedAt = $dtCreatedAt;
        $this->nmSender = $nmSender;
        $this->nmRecipient = $nmRecipient;
        $this->txMessage = $txMessage;
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
            ->subject('Chegou o dia de abrir sua cápsula do tempo')
            ->markdown(
                'mail.openCapsule',
                [
                    'dtCreatedAt' => $this->dtCreatedAt,
                    'nmSender' => $this->nmSender,
                    'nmRecipient' => $this->nmRecipient,
                    'txMessage' => $this->txMessage,
                    'imLogo' => 'https://app.brinquecoin.com/img/brinquecoin.png',
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
