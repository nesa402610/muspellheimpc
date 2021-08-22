<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use request;

class orderconfirmed extends Mailable
{
    use Queueable, SerializesModels;


    protected $name;
    protected $email;
    protected $cart;
    /**
     *
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $cart)
    {
        $this->name = $name;
        $this->email = $email;
        $this->cart = $cart;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mails.ForUsers', [
            'name' => $this->name,
            'email' => $this->email,
            'cart' => $this->cart
        ]);
    }
}
