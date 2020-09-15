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
        return app(Pizza::class)->get();
    }

    public function getPizzasPaginate(int $pages)
    {
        return app(Pizza::class)->paginate($pages);
    }

    public function getPizzaSizes()
    {
        return app(PizzaSize::class)->get();
    }

    public function getPizzaToppings()
    {
        return app(PizzaTopping::class)->get();
    }

    public function getPayments()
    {
        return app(Payment::class)->get();
    }

    public function getCurrencies()
    {
        return app(Currency::class)->get();
    }

    public function getDeliveryMethods()
    {
        return app(DeliveryMethod::class)->get();
    }
}
