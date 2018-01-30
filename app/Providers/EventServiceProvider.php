<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
        'App\Events\UserRegistered' => [
            'App\Listeners\SendUserAccountActivationEmail',
        ],

        'App\Events\JobPosted' => [
            'App\Listeners\UpdateStatsTable',
        ],

        'App\Events\FreelancerHired' => [
            'App\Listeners\UpdatesStatsTableHireInfo',
        ],

        'App\Events\ProposalReview' => [
            'App\Listeners\ProposalDeclinedListener',

        ],

         'App\Events\ProposalShortListed' => [
            'App\Listeners\ProposalShortlistedListener',

        ],

        'App\Events\ProposalReceived' => [
            'App\Listeners\ProposalReceivedListener',

        ],

        'App\Events\FreelancerHired' => [
            'App\Listeners\FreelancerHiredListener',

        ],

        'App\Events\MessagingEvent' => [
            'App\Listeners\MessagingEventListener',

        ],


        'App\Events\JobApplicationInvitation' => [
            'App\Listeners\JobApplicationInvitationListener',

        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
