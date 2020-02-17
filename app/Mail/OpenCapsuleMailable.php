<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OpenCapsuleMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $created_at;
    public $from;
    public $to;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($created_at, $from, $to, $message)
    {
        $this->created_at = $created_at;
        $this->from = $from;
        $this->to = $to;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('capsula@brinquecoin.com', 'Brinque Coin')
            ->subject('Chegou o dia de abrir sua cápsula do tempo')
            ->markdown('mail.openCapsule')
            ->with(
                [
                    'created_at' => $this->created_at, 
                    'from' => $this->from,
                    'to' => $this->to,
                    'message' => $this->message,
                    'image' => 'https://app.brinquecoin.com/img/brinquecoin.png',
                ]
            );
    }
}
