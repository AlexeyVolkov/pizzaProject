<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Customer;
use App\Models\DeliveryMethod;
use App\Models\Pizza;
use App\Models\PizzaSize;
use App\Models\PizzaTopping;
use App\Models\Payment;
use Illuminate\Http\Request;

class PizzaController extends Controller
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
//        // get Customer
//        $customer = Customer::findFromRequest($request);
//
//        // if Customer exists
//        if ($customer) {
//            // get Order
//            $order = $customer->orders()->where('is_confirmed', false)->latest()->first();
//            if ($order) {
//                // show also basket
//                $viewAttributes['order'] = $order;
//            }
//        }

        return view('layout.index', $viewAttributes);
    }
}
