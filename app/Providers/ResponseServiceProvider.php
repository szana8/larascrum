<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Response', function()
        {
            return new \App\Http\Response\Response;
        });

        $this->app->alias('Response', '\App\Http\Response\Facades\Response');
    }
}
