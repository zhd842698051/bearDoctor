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

         'SocialiteProviders\Manager\SocialiteWasCalled' => [
                'SocialiteProviders\QQ\QqExtendSocialite@handle',
<<<<<<< HEAD
=======
                'SocialiteProviders\Weibo\WeiboExtendSocialite@handle',

>>>>>>> 5d32190cc5d6ea35f7a8418ebd1fd716c6821259
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
