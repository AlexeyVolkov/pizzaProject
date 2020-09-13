<?php

namespace App\Http\Livewire;

use App\Models\Pizza;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PizzaCard extends Component
{
    public $topping_id;
    public $size_id;
    public $price;
    public $quantity = 1;
    public $pizza;
    public $toppings;
    public $sizes;

    public function mount(Pizza $pizza, Collection $toppings, Collection $sizes)
    {
        $this->pizza = $pizza;
        $this->price = $this->pizza->basic_price;
        $this->toppings = $toppings;
        $this->sizes = $sizes;
    }

    public function render()
    {
        return view('livewire.pizza-card', [
            'toppings' => $this->toppings,
            'sizes' => $this->sizes
        ]);
    }

    public function updatedToppingId(int $value)
    {
        $this->topping_id = $value;
        $this->updatePrice();
    }

    public function updatePrice()
    {
        $topping_factor = $this->toppings->find($this->topping_id)->price_factor ?? 1;
        $size_factor = $this->sizes->find($this->size_id)->price_factor ?? 1;

        $this->price =
            $this->pizza->basic_price
            * $topping_factor
            * $size_factor
            * $this->quantity;
    }

    public function updatedSizeId(int $value)
    {
        $this->size_id = $value;
        $this->updatePrice();
    }

    public function updatedQuantity(int $value)
    {
        $this->quantity = $value;
        $this->updatePrice();
    }
}
