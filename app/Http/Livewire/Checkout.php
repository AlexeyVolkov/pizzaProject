<?php

namespace App\Http\Livewire;

use App\Http\Controllers\OrderController;
use App\Models\OrderedPizza;
use App\Services\PizzaRepository;
use Livewire\Component;

class Checkout extends Component
{
    public string $name = '';
    public string $address = '';
    public string $comments = '';
    public bool $checkedOut = false;

    protected $listeners = ['orderConfirmed'];

    protected $rules = [
        'name' => 'nullable|string',
        'address' => 'nullable|string|min:6',
        'comments' => 'nullable|string'
    ];

    public function render(PizzaRepository $pizzaRepository)
    {
        $order = OrderController::getBySessionId();
        $pizzas = $pizzaRepository->getPizzas();
        $sizes = $pizzaRepository->getPizzaSizes();
        $toppings = $pizzaRepository->getPizzaToppings();
        $currencies = $pizzaRepository->getCurrencies();
        $orderedPizzas = OrderedPizza::where('order_id', $order->id)->get();
        $payments = $pizzaRepository->getPayments();
        $deliveryMethods = $pizzaRepository->getDeliveryMethods();
        // total price
        $totalPrice = 0;
        foreach ($orderedPizzas as $orderedPizza) {
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

        return view('livewire.checkout', [
            'totalPrice' => $totalPrice,
            'toppings' => $toppings,
            'sizes' => $sizes,
            'currencies' => $currencies,
            'order' => $order,
            'pizzas' => $pizzas,
            'orderedPizzas' => $orderedPizzas,
            'payments' => $payments,
            'deliveryMethods' => $deliveryMethods
        ]);
    }

    public function changeDeliveryMethod(int $methodId, PizzaRepository $pizzaRepository)
    {
        $order = OrderController::getBySessionId();
        $order->delivery_method_id = $pizzaRepository->getDeliveryMethods()->find($methodId)->id;
        $order->save();
    }

    public function changePaymentMethod(int $methodId, PizzaRepository $pizzaRepository)
    {
        $order = OrderController::getBySessionId();
        $order->payment_id = $pizzaRepository->getPayments()->find($methodId)->id;
        $order->save();
    }

    public function checkout()
    {
        $this->validate();

        $order = OrderController::getBySessionId();
        $order->name = filter_var($this->name, FILTER_SANITIZE_STRING);
        $order->address = filter_var($this->address, FILTER_SANITIZE_STRING);
        $order->comments = filter_var($this->comments, FILTER_SANITIZE_STRING);
        $order->is_confirmed = true;
        $order->save();

        $this->checkedOut = true;
        $this->emitSelf('orderConfirmed');
    }

    public function orderConfirmed()
    {
        sleep(5);

        return redirect()->route('orderConfirmed');
    }
}
