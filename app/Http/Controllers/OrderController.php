<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public static function createNewOrder(): int
    {
        $order = new Order;
        if (Auth::check()) {
            $order->user_id = Auth::id();
        }
        $order->save();
        return $order->id;
    }

    public static function getBySessionId(): Order
    {
        $orderId = filter_var(session('order_id'), FILTER_SANITIZE_NUMBER_INT);
        return app('getOrders')->find($orderId);
    }
}
