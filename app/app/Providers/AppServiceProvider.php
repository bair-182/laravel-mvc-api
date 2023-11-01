<?php

namespace App\Providers;

use App\Helpers\Observer\ObserverHelper;
use App\Providers\OrderEvents\OrderItemUpdated;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        //ObserverHelper::update(); //удалить если не сработает
    }
}
