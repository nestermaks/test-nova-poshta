<?php

namespace App\Providers;

use App\Translations\Facades\SiteLang;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $locale = SiteLang::getLocale();
        app()->setLocale($locale);

        View::share('locale', $locale);
    }
}
