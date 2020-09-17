<?php

namespace App\Http\Livewire;

use App\Http\Controllers\OrderedPizzaController;
use App\Models\Order;
use App\Models\Pizza;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PizzaCard extends Component
{
    public int $topping_id = 1;
    public int $size_id = 1;
    public float $price;
    public int $quantity = 1;
    public Pizza $pizza;
    public Collection $toppings;
    public Collection $sizes;
    public float $currencyPriceFactor;

    public function mount(Pizza $pizza, Collection $toppings, Collection $sizes, int $currencyPriceFactor)
    {
        $this->pizza = $pizza;
        $this->price = $this->pizza->basic_price;
        $this->toppings = $toppings;
        $this->sizes = $sizes;
        $this->currencyPriceFactor = $currencyPriceFactor;
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
            * $this->quantity
            * $this->currencyPriceFactor;
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
