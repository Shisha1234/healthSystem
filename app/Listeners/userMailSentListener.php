<?php

namespace App\Listeners;

use App\Events\userMailSentEvent;
use App\Mail\UserAccActiveMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class userMailSentListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  userMailSentEvent  $event
     * @return void
     */
    public function handle(userMailSentEvent $event)
    {
        Mail::to($event->user->email)->send(new UserAccActiveMail($event->user));
    }
}
