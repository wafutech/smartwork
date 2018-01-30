<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProposalReceivedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $user;
    protected $job;
    protected $freelancer;
    protected $proposal;
    public function __construct($user,$job,$freelancer,$proposal)
    {
        $this->user = $user;
        $this->job  = $job;
        $this->freelancer = $freelancer;
        $this->proposal = $proposal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.proposalReceived',array('user'=>$this->user,'job'=>$this->job,'freelancer'=>$this->freelancer,'proposal'=>$this->proposal,'user'=>$this->user));
    }
}
