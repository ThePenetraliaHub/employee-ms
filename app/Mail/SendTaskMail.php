<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTaskMail extends Mailable
{
    use Queueable, SerializesModels;
    public $message_headline;
    public $employee;
    public $project_name;
    public $details;
    public $start_date;
    public $end_date;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message_headline,$employee,$project_name,$details,$start_date,$end_date)
    {
         $this->message_headline = $message_headline;
         $this->employee = $employee;
         $this->project_name = $project_name;
         $this->details=$details;
         $this->start_date=$start_date;
         $this->end_date=$end_date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->markdown('emails.broadcast.send_task')->subject($this->project_name);
    }
}
