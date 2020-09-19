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
        $this->getCurrentOrderId($request);

        return view('layout.index');
    }

    private function getCurrentOrderId(Request $request)
    {
        if (!$request->session()->has('order_id')) {
            $request->session()->put('order_id', OrderController::createNewOrder());
        }

    }

    public function checkout(Request $request)
    {
        $this->getCurrentOrderId($request);

        return view('layout.checkout');
    }

    public function orderConfirmed(Request $request)
    {
        $request->session()->forget('order_id');

        return redirect()->route('home');
    }

    public function orderHistory(Request $request)
    {
        $this->getCurrentOrderId($request);

        return view('layout.history');
    }

}
