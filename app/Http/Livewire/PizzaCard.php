<?php

namespace App\Http\Livewire;

use App\Http\Controllers\OrderedPizzaController;
use App\Models\Pizza;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PizzaCard extends Component
{
    public $topping_id = 1;
    public $size_id = 1;
    public $price;
    public $quantity = 1;
    public $pizza;
    public $toppings;
    public $sizes;
    public $button_message;

    public function mount(Pizza $pizza, Collection $toppings, Collection $sizes)
    {
        $this->pizza = $pizza;
        $this->price = $this->pizza->basic_price;
        $this->toppings = $toppings;
        $this->sizes = $sizes;
        $this->button_message = __('Add');
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

    public function submit()
    {
        $this->added = true;
        $this->button_message = __('Added');
        $this->emit('addPizza');
        OrderedPizzaController::createOrderedPizza(
            session('order_id'),
            $this->pizza->id,
            $this->topping_id,
            $this->size_id,
            $this->quantity
        );

    }

    public function resetSubmit()
    {
        $this->added = false;
        $this->button_message = __('Add');
        $this->emit('removePizza');
    }
}
