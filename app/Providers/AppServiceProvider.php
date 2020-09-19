<?php

namespace App\Providers;

use App\Models\Currency;
use App\Models\DeliveryMethod;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Pizza;
use App\Models\PizzaSize;
use App\Models\PizzaTopping;
use App\Services\PizzaRepository;
use Illuminate\Pagination\Paginator;
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
        $this->app->singleton(PizzaRepository::class, function ($app) {
            return new PizzaRepository();
        });

        $this->app->singleton(PizzaTopping::class, function ($app) {
            return new PizzaTopping();
        });

        $this->app->singleton('getPizzaToppings', function ($app) {
            return app(PizzaTopping::class)->get();
        });

        $this->app->singleton(PizzaSize::class, function ($app) {
            return new PizzaSize();
        });

        $this->app->singleton('getPizzaSizes', function ($app) {
            return app(PizzaSize::class)->get();
        });

        $this->app->singleton(Payment::class, function ($app) {
            return new Payment();
        });

        $this->app->singleton('getPayments', function ($app) {
            return app(Payment::class)->get();
        });

        $this->app->singleton(Currency::class, function ($app) {
            return new Currency();
        });

        $this->app->singleton('getCurrencies', function ($app) {
            return app(Currency::class)->get();
        });

        $this->app->singleton(DeliveryMethod::class, function ($app) {
            return new DeliveryMethod();
        });

        $this->app->singleton('getDeliveryMethods', function ($app) {
            return app(DeliveryMethod::class)->get();
        });

        $this->app->singleton('getPizzas', function ($app) {
            return Pizza::get();
        });

        $this->app->singleton('getOrders', function ($app) {
            return Order::get();
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
