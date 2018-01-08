<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Providers\CacheUserProvider;

class AuthManagerServiceProvider extends ServiceProvider
{


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Auth::provider('cache', function ($app, $config){
            return new CacheUserProvider($app['hash'], $config['model']);
        });

    }
}
