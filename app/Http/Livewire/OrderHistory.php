<?php

namespace App\Http\Livewire;

use App\Http\Controllers\OrderController;
use App\Services\PizzaRepository;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderHistory extends Component
{
    public function render(PizzaRepository $pizzaRepository)
    {
        $user_id = Auth::id();
        $orders = OrderController::getByUserId($user_id)->where('is_confirmed', true)->sortByDesc('created_at');
        $pizzas = $pizzaRepository->getPizzas();
        $sizes = $pizzaRepository->getPizzaSizes();
        $toppings = $pizzaRepository->getPizzaToppings();
        $currencies = $pizzaRepository->getCurrencies();
        $payments = $pizzaRepository->getPayments();
        $deliveryMethods = $pizzaRepository->getDeliveryMethods();
        $ordered_pizzas = $pizzaRepository->getOrderedPizzas();

        $totalPrices = [];
        foreach ($orders as $order) {
            // total price
            $totalPrice = 0;
            foreach ($ordered_pizzas->where('order_id', $order->id) as $orderedPizza) {
                $totalPrice +=
                    $pizzas->find($orderedPizza->pizza_id)->basic_price
                    * $sizes->find($orderedPizza->size_id)->price_factor
                    * $orderedPizza->quantity;
                $totalPrice += $toppings->find($orderedPizza->topping_id)->basic_price;
            }
            $totalPrice *= $deliveryMethods->find($order->delivery_method_id)->price_factor;
            $totalPrice *= $payments->find($order->payment_id)->price_factor;
            $totalPrice *= $currencies->find($order->currency_id)->price_factor;
            $totalPrice = round($totalPrice, 2);

            $totalPrices[$order->id] = $totalPrice;
        }

        return view('livewire.order-history', [
            'orders' => $orders,
            'pizzas' => $pizzas,
            'sizes' => $sizes,
            'toppings' => $toppings,
            'currencies' => $currencies,
            'payments' => $payments,
            'deliveryMethods' => $deliveryMethods,
            'ordered_pizzas' => $ordered_pizzas,
            'totalPrices' => $totalPrices
        ]);
    }
}
