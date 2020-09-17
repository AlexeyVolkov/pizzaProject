<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderedPizza;
use App\Services\PizzaRepository;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Basket extends Component
{
    public int $orderId;
    public Collection $pizzas;
    public Collection $toppings;
    public Collection $sizes;
    public  $ordered_pizzas;

    protected $listeners = ['addPizza', 'removePizza'];

    private PizzaRepository $pizzaRepository;

    public function mount(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;

        $this->pizzas = $this->pizzaRepository->getPizzas();
        $this->sizes = $this->pizzaRepository->getPizzaSizes();
        $this->toppings = $this->pizzaRepository->getPizzaToppings();
        $this->orderId = Order::find(session('order_id'))->id;
        $this->ordered_pizzas = OrderedPizza::where('order_id', $this->orderId)->get();
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
        $this->ordered_pizzas = OrderedPizza::where('order_id', $this->orderId)->get();
    }

    public function removePizza($orderedPizzaId)
    {
        $this->ordered_pizzas->find($orderedPizzaId)->delete();
        $this->updateOrderedPizzas();
    }

    public function checkout()
    {
        return redirect()->route('checkout');
    }
}
