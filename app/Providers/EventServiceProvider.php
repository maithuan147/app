<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\PostWasCategory' => [
            'App\Listeners\PostWasCategoryListeners',
        ],
        'App\Events\PostWasTag' => [
            'App\Listeners\PostWasTagListeners',
        ],
        'App\Events\PostCloneCategory' => [
            'App\Listeners\PostCloneCategoryListeners',
        ],
        'App\Events\PostCloneTag' => [
            'App\Listeners\PostCloneTagListeners',
        ],
        'App\Events\ProductEvents\ProductWasCategory' => [
            'App\Listeners\ProductListners\ProductWasCategoryListeners',
        ],
        'App\Events\ProductEvents\ProductWasTag' => [
            'App\Listeners\ProductListners\ProductWasTagListeners',
        ],
        'App\Events\ProductEvents\ProductCloneCategory' => [
            'App\Listeners\ProductListners\ProductCloneCategoryListeners',
        ],
        'App\Events\ProductEvents\ProductCloneTag' => [
            'App\Listeners\ProductListners\ProductCloneTagListeners',
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
