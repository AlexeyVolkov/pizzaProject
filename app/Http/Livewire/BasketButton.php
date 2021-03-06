<?php

namespace App\Http\Livewire;

use App\Http\Controllers\OrderController;
use App\Models\OrderedPizza;
use Livewire\Component;

class BasketButton extends Component
{
    protected $listeners = ['addPizza', 'removePizza'];

    public function render()
    {
        $order_id = OrderController::getBySessionId()->id;

        return view('livewire.basket-button', [
            'pizzaNumber' => OrderedPizza::where('order_id', $order_id)->count()
        ]);
    }

    public function addPizza()
    {
    }

    public function removePizza()
    {
    }
}
