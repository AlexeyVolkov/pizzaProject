<?php

namespace App\Http\Livewire;

use App\Http\Controllers\OrderController;
use App\Models\Order;
use App\Models\OrderedPizza;
use App\Services\PizzaRepository;
use Livewire\Component;

class Basket extends Component
{
    protected $listeners = ['addPizza', 'removePizza', 'currencyChanged'];
    private Order $order;
    private PizzaRepository $pizzaRepository;

    public function render(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;
        $this->order = OrderController::getBySessionId();

        return view('livewire.basket', [
            'currencies' => $this->pizzaRepository->getCurrencies(),
            'toppings' => $this->pizzaRepository->getPizzaToppings(),
            'sizes' => $this->pizzaRepository->getPizzaSizes(),
            'pizzas' => $this->pizzaRepository->getPizzas(),
            'orderedPizzas' => OrderedPizza::where('order_id', $this->order->id)->get(),
            'order' => $this->order
        ]);
    }

    public function addPizza()
    {
    }

    public function removePizza()
    {
    }

    public function removePizzaFromBasket($orderedPizzaId)
    {
        OrderedPizza::find($orderedPizzaId)->delete();
        $this->emit('removePizza');
    }

    public function checkout()
    {
        return redirect()->route('checkout');
    }

    public function currencyChanged()
    {
    }
}
