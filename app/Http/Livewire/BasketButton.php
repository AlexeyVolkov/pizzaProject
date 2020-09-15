<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderedPizza;
use Livewire\Component;

class BasketButton extends Component
{
    public int $pizza_number = 0;
    public bool $clicked = false;
    public int $order_id = 0;

    protected $listeners = ['addPizza', 'removePizza'];

    public function mount()
    {
        $this->order_id = Order::find(session('order_id'))->id;
        $this->updatePizzaNumber();
    }

    public function updatePizzaNumber()
    {
        $this->pizza_number = OrderedPizza::where('order_id', $this->order_id)->count();
    }

    public function render()
    {
        return view('livewire.basket-button');
    }

    public function addPizza()
    {
        $this->updatePizzaNumber();
    }

    public function removePizza()
    {
        $this->updatePizzaNumber();
    }
}
