<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailableClass extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Despesa cadastrada";
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.email')
                    ->with([
                        'messageContent' => $this->message
                    ]);
    }
}
