<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Model\Board;

class Reminder extends Notification
{
    use Queueable;
    protected $board;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Board $board)
    {
        $this->board = $board;
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
            ->subject(
                'Hora do quadrinho de '.$this->board->type->name.
                ' de '.$this->board->person->name
            )
            ->markdown(
                'mail.reminder',
                [
                    'name'  => $this->board->user->name,
                    'type'  => $this->board->type->name,
                    'link'   => getenv('APP_URL').'/quadros/exibir/'.$this->board->code,
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
            'title' => 'Hora do quadrinho de '.
                $this->board->type->name.' de '.$this->board->person->name,
            'date' => now(),
        ];
    }
}
