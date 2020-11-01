<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

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
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        Log::info('##BRINQUECOIN## [LEMBRETES ENVIADOS]');

        return (new MailMessage)
            ->from('contato@brinquecoin.com', 'Brinque Coin')
            ->subject(
                'Como foi quadrinho de '.$this->board->type->name.
                ' de '.$this->board->person->name. ' essa semana'
            )
            ->markdown(
                'mail.reminder',
                [
                    'name'  => $this->board->user->name,
                    'type'  => $this->board->type->name,
                    'link'   => env('APP_URL', 'https://app.brinquecoin.com').'/quadros/exibir/'.$this->board->code,
                    'image' => env('APP_URL', 'https://app.brinquecoin.com').'/img/brinquecoin.png',
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
