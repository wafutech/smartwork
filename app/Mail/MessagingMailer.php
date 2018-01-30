<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessagingMailer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $freelancer;
    public $job;
    public $message;
    public $message_id;
   

    public function __construct($freelancer,$job,$message,$message_id)
    {
        $this->freelancer =$freelancer;
        $this->job = $job;
        $this->message = $message;
        $this->message_id =$message_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    return $this->view('mails.messanger',array('freelancer'=>$this->freelancer,'job'=>$this->job,'message'=>$this->message,'message_id'=>$this->message_id));

    }
}
