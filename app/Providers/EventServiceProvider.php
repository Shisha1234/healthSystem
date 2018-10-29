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
        'App\Events\userAccEvent' => [
            'App\Listeners\userAccListener',
        ],
        'App\Events\userMailSentEvent' => [
            'App\Listeners\userMailSentListener',
        ],
        'App\Events\BuildingMenu1' => [
            'App\Listeners\buildmenu1',
        ],
        'App\Events\BuildingMenu2' => [
            'App\Listeners\buildmenu2',
        ],
        'App\Events\BuildingMenu3' => [
            'App\Listeners\buildmenu3',
        ],
        'App\Events\BuildingMenu4' => [
            'App\Listeners\buildmenu4',
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
