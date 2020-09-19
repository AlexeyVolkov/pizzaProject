<?php

namespace App\Http\Livewire;

use App\Http\Controllers\OrderController;
use App\Services\PizzaRepository;
use Livewire\Component;

class PizzaList extends Component
{
    protected $listeners = ['currencyChanged'];
    private PizzaRepository $pizzaRepository;

    public function render(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;

        return view('livewire.pizza-list', [
            'order' => OrderController::getBySessionId(),
            'sizes' => $this->pizzaRepository->getPizzaSizes(),
            'pizzas' => $this->pizzaRepository->getPizzasPaginate(8),
            'toppings' => $this->pizzaRepository->getPizzaToppings(),
            'currencies' => $this->pizzaRepository->getCurrencies(),
        ]);
    }

    public function currencyChanged()
    {
    }
}
