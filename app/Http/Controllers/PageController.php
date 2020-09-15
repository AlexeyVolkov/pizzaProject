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
        $this->getOrderId($request);

        return view('layout.index');
    }

    private function getOrderId(Request $request)
    {
        if (!$request->session()->has('order_id')) {

            $request->session()->put('order_id', OrderController::createNewOrder());
        }
    }

    public function checkout(Request $request)
    {
        $this->getOrderId($request);

        return view('layout.checkout');
    }
}
