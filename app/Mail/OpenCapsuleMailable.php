<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OpenCapsuleMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $dtCreatedAt;
    public $nmSender;
    public $nmRecipient;
    public $txMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dtCreatedAt, $nmSender, $nmRecipient, $txMessage)
    {
        $this->dtCreatedAt = $dtCreatedAt;
        $this->nmSender = $nmSender;
        $this->nmRecipient = $nmRecipient;
        $this->txMessage = $txMessage;
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
                    'dtCreatedAt' => $this->dtCreatedAt, 
                    'nmSender' => $this->nmSender,
                    'nmRecipient' => $this->nmRecipient,
                    'txMessage' => $this->txMessage,
                    'imLogo' => 'https://app.brinquecoin.com/img/brinquecoin.png',
                ]
            );
    }
}
