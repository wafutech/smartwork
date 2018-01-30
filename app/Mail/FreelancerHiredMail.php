<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FreelancerHiredMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $freelancer;
    public $job;
    public $available_jobs;
    public function __construct($freelancer,$job)
    {
        $this->freelancer = $freelancer;
        $this->job = $job;
        $this->available_jobs = $available_jobs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.freelancerHired',array('freelancer'=>$this->freelancer,'job'=>$this->job,'jobs'=>$this->available_jobs));
    }
}
