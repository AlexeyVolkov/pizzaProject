<?php

namespace App\Services;

use App\Models\Currency;
use App\Models\DeliveryMethod;
use App\Models\Payment;
use App\Models\Pizza;
use App\Models\PizzaSize;
use App\Models\PizzaTopping;

class PizzaRepository
{
    public function getPizzas()
    {
        return app('getPizzas');
    }

    public function getPizzasPaginate(int $pages)
    {
        return app(Pizza::class)->paginate($pages);
    }

    public function getPizzaSizes()
    {
        return app('getPizzaSizes');
    }

    public function getPizzaToppings()
    {
        return app('getPizzaToppings');
    }

    public function getPayments()
    {
        return app('getPayments');
    }

    public function getCurrencies()
    {
        return app('getCurrencies');
    }

    public function getDeliveryMethods()
    {
        return app('getDeliveryMethods');
    }

    public function getOrderedPizzas()
    {
        return app('getOrderedPizzas');
    }
}
