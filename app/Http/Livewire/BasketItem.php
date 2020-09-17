<?php

namespace App\Http\Livewire;

use App\Models\OrderedPizza;
use App\Models\Pizza;
use App\Models\PizzaSize;
use App\Models\PizzaTopping;
use App\Services\PizzaRepository;
use Livewire\Component;

class BasketItem extends Component
{
    public int $orderedPizzaId;
    public  $orderedPizza;
    public PizzaTopping $topping;
    public PizzaSize $size;
    public Pizza $pizza;

    private PizzaRepository $pizzaRepository;

    public function mount(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;

        $this->orderedPizza = OrderedPizza::find($this->orderedPizzaId);
        $this->pizza = $this->pizzaRepository->getPizzas()->find($this->orderedPizza->pizza_id);
        $this->topping = $this->pizzaRepository->getPizzaToppings()->find($this->orderedPizza->topping_id);
        $this->size = $this->pizzaRepository->getPizzaSizes()->find($this->orderedPizza->size_id);
    }

    public function render()
    {
        $viewAttributes = [
            'orderedPizza' => $this->orderedPizza,
            'pizza' => $this->pizza,
            'topping' => $this->topping,
            'size' => $this->size
        ];

        return view('livewire.basket-item', $viewAttributes );
    }

    public function removePizza()
    {
        $this->emitUp('removePizza', $this->orderedPizzaId);
    }
}
