<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class ChuckNorrisApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    // public function register(): void
    // {
    //     //
    // }

    public function register()
{
    $this->app->singleton('ChuckNorrisApi', function ($app) {
        return new Client([
            'base_uri' => 'https://api.chucknorris.io/',
            'timeout' => 5.0,
        ]);
    });
}

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
