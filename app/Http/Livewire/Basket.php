<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderedPizza;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use App\Services\PizzaRepository;

class Basket extends Component
{
    public int $order_id;
    public Collection $pizzas;
    public Collection $toppings;
    public Collection $currencies;
    public Collection $delivery_methods;
    public Collection $sizes;
    public Collection $ordered_pizzas;

    protected $listeners = ['addPizza', 'removePizza'];
    private $pizzaRepository;

    public function mount(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;

        $this->pizzas = $this->pizzaRepository->getPizzas();
        $this->sizes = $this->pizzaRepository->getPizzaSizes();
        $this->toppings = $this->pizzaRepository->getPizzaToppings();
        $this->currencies = $this->pizzaRepository->getCurrencies();
        $this->delivery_methods = $this->pizzaRepository->getDeliveryMethods();
        $this->order_id = Order::find(session('order_id'))->id;
        $this->ordered_pizzas = OrderedPizza::where('order_id', $this->order_id)->get();
    }

    public function render()
    {
        return view('livewire.basket');
    }

    public function addPizza()
    {
        $this->updateOrderedPizzas();
    }

    public function updateOrderedPizzas()
    {
        $this->ordered_pizzas = OrderedPizza::where('order_id', $this->order_id)->get();
    }

    public function removePizza()
    {
        $this->updateOrderedPizzas();
    }

    public function checkout()
    {
        return redirect()->route('checkout');
    }
}
