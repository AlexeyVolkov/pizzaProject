<?php

namespace App\Http\Livewire;

use App\Models\Currency;
use App\Models\DeliveryMethod;
use App\Models\Payment;
use App\Models\Pizza;
use App\Models\PizzaSize;
use App\Models\PizzaTopping;
use Livewire\Component;

class PizzaCard extends Component
{
    public $topping_id = 0;
    public $price = 0;
    public $pizza_id;
    public $pizza;

    public function mount(Pizza $pizza)
    {
        $this->pizza = $pizza;
        $this->price = $this->pizza->basic_price;
    }

    public function render()
    {
        return view('livewire.pizza-card', [
            'pizza' => $this->pizza,
            'toppings' => PizzaTopping::get()
        ]);
    }

    public function updatedToppingId(int $value)
    {
        $topping_factor = PizzaTopping::find($value)->price_factor;
        $this->price = $this->pizza->basic_price * $topping_factor;
    }
}
