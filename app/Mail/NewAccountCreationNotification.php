<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewAccountCreationNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $send_to_email = '';
    public $send_to_password = '';
    public function __construct($Email, $pwd)
    {
        $this->send_to_email = $Email;
        $this->send_to_password = $pwd;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('backend.mail.NewAccountCreationNotification',[
            'email' => $this->send_to_email,
            'password' => $this->send_to_password,
        ]);
    }
}
