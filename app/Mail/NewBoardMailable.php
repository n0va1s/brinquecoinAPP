<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewBoardMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $parent;
    public $link;
    public $type;
    public $person;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $link)
    {
        $this->parent = $parent;
        $this->link = $link;
        $this->type = $type;
        $this->person = $person;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contato@brinquecoin.com', 'BrinqueCoin')
            ->subject('Novo quadro de '+$this->type+' para '+$this->person)
            ->markdown('mail.newBoard')
            ->with([
                'name' => $this->parent,
                'link' => $this->link,
                'image' => 'https://brinquecoin.com/wp-content/uploads/2019/11/brinquecoinlogomin1.png'
            ]);
    }
}
