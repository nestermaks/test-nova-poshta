<?php

namespace App\Providers;

use App\Translations\SiteLang;
use Illuminate\Support\ServiceProvider;

class SiteLangServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('SiteLang', function () {
            return new SiteLang();
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
