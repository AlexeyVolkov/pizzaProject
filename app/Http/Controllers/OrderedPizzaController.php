<?php

namespace App\Http\Controllers;

use App\Models\OrderedPizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderedPizzaController extends Controller
{
    public static function createNewOrderedPizza(int $order_id, int $pizza_id, $topping_id, $size_id, int $quantity)
    {
        $ordered_pizza = new OrderedPizza;
        $ordered_pizza->order_id = $order_id;
        $ordered_pizza->pizza_id = $pizza_id;
        $ordered_pizza->topping_id = $topping_id;
        $ordered_pizza->size_id = $size_id;
        $ordered_pizza->quantity = $quantity;
        $ordered_pizza->save();
    }
}
