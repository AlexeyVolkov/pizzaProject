<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
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
}
