<?php

namespace App\Http\Livewire;

use App\Http\Controllers\OrderedPizzaController;
use App\Models\OrderedPizza;
use App\Models\Pizza;
use App\Models\PizzaSize;
use App\Models\PizzaTopping;
use Livewire\Component;

class BasketItem extends Component
{
    public OrderedPizza $orderedPizza;
    public PizzaTopping $topping;
    public PizzaSize $size;
    public Pizza $pizza;

    public function render()
    {
        return view('livewire.basket-item');
    }

    public function removePizza()
    {
        OrderedPizzaController::removeOrderedPizza(
            $this->orderedPizza->id
        );
        $this->emit('removePizza');
    }
}
