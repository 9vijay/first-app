<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Services\RegistrationCheckService;

class UserRegistrationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RegistrationCheckService::class, function ( $app) {
            return new RegistrationCheckService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
