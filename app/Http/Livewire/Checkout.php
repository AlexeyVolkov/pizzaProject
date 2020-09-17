<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderedPizza;
use App\Services\PizzaRepository;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Checkout extends Component
{
    public string $name = '';
    public string $address = '';
    public string $comments = '';
    public Collection $payments;
    public Collection $orderedPizzas;
    public Order $order;
    public Collection $pizzas;
    public Collection $toppings;
    public Collection $currencies;
    public Collection $deliveryMethods;
    public Collection $sizes;
    public float $totalPrice;

    protected $rules = [
        'order.name' => 'nullable|string',
        'order.address' => 'nullable|string|min:6',
        'order.comments' => 'nullable|string'
    ];

    private $pizzaRepository;

    public function mount(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;

        $this->pizzas = $this->pizzaRepository->getPizzas();
        $this->sizes = $this->pizzaRepository->getPizzaSizes();
        $this->toppings = $this->pizzaRepository->getPizzaToppings();
        $this->currencies = $this->pizzaRepository->getCurrencies();
        $this->deliveryMethods = $this->pizzaRepository->getDeliveryMethods();
        $this->payments = $this->pizzaRepository->getPayments();

        $this->order = Order::find(session('order_id'));
        $this->orderedPizzas = OrderedPizza::where('order_id', $this->order->id)->get();
    }

    public function render()
    {
        $this->totalPrice = 0;
        foreach ($this->orderedPizzas as $orderedPizza) {
            $this->totalPrice +=
                $this->pizzas->find($orderedPizza->pizza_id)->basic_price
                * $this->sizes->find($orderedPizza->size_id)->price_factor
                * $orderedPizza->quantity;
            $this->totalPrice += $this->toppings->find($orderedPizza->topping_id)->basic_price;
        }
        $this->totalPrice *= $this->deliveryMethods->find($this->order->delivery_method_id)->price_factor;
        $this->totalPrice *= $this->payments->find($this->order->payment_id)->price_factor;
        $this->totalPrice *= $this->currencies->find($this->order->currency_id)->price_factor;
        $this->totalPrice = round($this->totalPrice, 2);

        return view('livewire.checkout');
    }

    public function changeDeliveryMethod(int $methodId)
    {
        $this->order->delivery_method_id = $this->deliveryMethods->find($methodId)->id;
        $this->order->save();
    }

    public function changePaymentMethod(int $methodId)
    {
        $this->order->payment_id = $this->payments->find($methodId)->id;
        $this->order->save();
    }

    public function checkout(){
        $this->validate();

        $this->order->is_confirmed = true;
        $this->order->save();

        return redirect()->route('orderConfirmed');
    }
}
