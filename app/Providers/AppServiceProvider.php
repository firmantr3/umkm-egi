<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\KeranjangService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('keranjang', function($app) {
            return new KeranjangService;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
