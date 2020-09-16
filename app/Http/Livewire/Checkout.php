<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderedPizza;
use App\Services\PizzaRepository;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Checkout extends Component
{
    public string $deliveryMethod = 'delivery';
    public string $name = '';
    public string $address = '';
    public string $comments = '';
    public int $paymentId = 1;
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
        'name' => 'string',
        'address' => 'exclude_if:deliveryMethod,carryout|required|min:6',
        'comments ' => 'string',
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
                $this->pizzas[$orderedPizza->pizza_id]->basic_price
                * $this->toppings[$orderedPizza->topping_id]->price_factor
                * $this->sizes[$orderedPizza->size_id]->price_factor
                * $orderedPizza->quantity;
        }
        $this->totalPrice *= $this->deliveryMethods[$this->order->delivery_method_id]->price_factor;
        $this->totalPrice *= $this->payments[$this->order->payment_id]->price_factor;

        return view('livewire.checkout');
    }

    public function changeDeliveryMethod(string $method)
    {
        switch ($method) {
            case 'delivery':
                $this->deliveryMethod = 'delivery';
                break;
            case 'carryout':
                $this->deliveryMethod = 'carryout';
                break;
        }
    }
}
