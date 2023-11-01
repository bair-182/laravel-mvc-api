<?php

namespace App\Providers;

use App\Providers\OrderEvents\OrderActivatedListener;
use App\Providers\OrderEvents\OrderStatus;
use App\Providers\OrderEvents\OrderCanceledListener;
use App\Providers\OrderEvents\OrderItemCreated;
use App\Providers\OrderEvents\OrderItemCreatedListener;
use App\Providers\OrderEvents\OrderItemUpdated;
use App\Providers\OrderEvents\OrderItemUpdateListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderItemUpdated::class => [
            OrderItemUpdateListener::class,
        ],
        OrderItemCreated::class => [
            OrderItemCreatedListener::class,
        ],
        OrderStatus::class => [
            OrderCanceledListener::class,
            OrderActivatedListener::class
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }

    protected $observers = [

    ];
}
