<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProposalShortlistedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     protected $user;
    protected $job;
    protected $otherJobs
    public function __construct($user,$job,$otherJobs)
    {
        $this->user =$user;
        $this->job = $job;
        $this->otherJobs = $otherJobs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.proposalShortlisted');
    }
}
