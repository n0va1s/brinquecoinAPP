<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewCapsuleMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contato@brinquecoin.com', 'Brinque Coin')
            ->subject('Sua cápsula do tempo foi criada')
            ->markdown('mail.newCapsule')
            ->with(
                [
                    'name' => $this->name
                ]
            );
    }
}