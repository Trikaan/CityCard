<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('App\Http\Controllers\Admin\CityController', function ($app) {
            return new \App\Http\Controllers\Admin\CityController();
        });

        $this->app->bind('App\Http\Controllers\Admin\TransportTypeController', function ($app) {
            return new \App\Http\Controllers\Admin\TransportTypeController();
        });

        $this->app->bind('App\Http\Controllers\Admin\TransportController', function ($app) {
            return new \App\Http\Controllers\Admin\TransportController();
        });

        $this->app->bind('App\Http\Controllers\Admin\TicketTypeController', function ($app) {
            return new \App\Http\Controllers\Admin\TicketTypeController();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
