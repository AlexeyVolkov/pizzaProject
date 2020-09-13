<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BasketButton extends Component
{
    public $clicked = false;

    protected $listeners = ['addPizza', 'removePizza'];

    public function render()
    {
        return view('livewire.basket-button');
    }

    public function addPizza()
    {
        $this->pizza_number++;
    }

    public function removePizza()
    {
        $this->pizza_number--;
    }
}
