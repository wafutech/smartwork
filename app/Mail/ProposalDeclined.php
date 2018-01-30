<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProposalDeclined extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $user;
    protected $job;
    protected $jobs;
    public function __construct($user,$job,$jobs)
    {
        $this->user = $user;
        $this->job = $job;
        $this->jobs = $jobs;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.proposalDeclined',array('user'=>$this->user,'job'=>$this->job,'jobs'=>$this->jobs));
    }
}
