<?php

namespace App\Listeners;

use App\Events\userAccEvent;
use App\Mail\AccActivatedMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class userAccListener
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
     * @param  userAccEvent  $event
     * @return void
     */
    public function handle(userAccEvent $event)
    {
        Mail::to('joanshi988@gmail.com')->send(new AccActivatedMail($event->user));
    }
}
