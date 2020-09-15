<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\DeliveryMethod;
use App\Models\Payment;
use App\Models\Pizza;
use App\Models\PizzaSize;
use App\Models\PizzaTopping;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $viewAttributes = [
            'pizzas' => Pizza::paginate(8),
            'toppings' => PizzaTopping::get(),
            'sizes' => PizzaSize::get(),
            'payments' => Payment::get(),
            'currencies' => Currency::all(),
            'delivery_methods' => DeliveryMethod::get(),
        ];

        // get Order
        if (!$request->session()->has('order_id')) {

            $request->session()->put('order_id', OrderController::createNewOrder());
        }

        return view('layout.index', $viewAttributes);
    }
}
