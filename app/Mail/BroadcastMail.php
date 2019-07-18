<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BroadcastMail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $body;
    public $senderMail;
    public $senderName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$body,$senderMail,$senderName)
    {
        //
         $this->subject = $subject;
         $this->body = $body;
         $this->senderMail = $senderMail;
         $this->senderName=$senderName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.broadcast.broadcast')->subject($this->subject);
    }
}
