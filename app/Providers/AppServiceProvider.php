<?php

namespace App\Providers;

use App\Models\DeliveryMethod;
use App\Models\PizzaTopping;
use App\Models\Currency;
use App\Models\Payment;
use App\Models\PizzaSize;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PizzaRepository::class, function ($app) {
            return new PizzaRepository();
        });

        $this->app->singleton(PizzaTopping::class, function ($app) {
            return new PizzaTopping();
        });

        $this->app->singleton(PizzaSize::class, function ($app) {
            return new PizzaSize();
        });

        $this->app->singleton(Payment::class, function ($app) {
            return new Payment();
        });

        $this->app->singleton(Currency::class, function ($app) {
            return new Currency();
        });

        $this->app->singleton(DeliveryMethod::class, function ($app) {
            return new DeliveryMethod();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
