<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require __DIR__ . '/../helpers.php';
        view()->composer('*', function ($view) {
            $view->with('cart', \App\Cart::content());
        });
    }
}
