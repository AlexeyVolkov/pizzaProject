<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use App\Services\PizzaRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class PizzaList extends Component
{
    public Collection $toppings;
    public Collection $payments;
    public Collection $currencies;
    public Collection $delivery_methods;
    public Collection $sizes;

    private $pizzaRepository;

    public function mount(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;

        $this->sizes = $this->pizzaRepository->getPizzaSizes();
        $this->toppings = $this->pizzaRepository->getPizzaToppings();
        $this->payments = $this->pizzaRepository->getPayments();
        $this->currencies = $this->pizzaRepository->getCurrencies();
        $this->delivery_methods = $this->pizzaRepository->getDeliveryMethods();
    }

    public function render()
    {
        $viewAttributes = [
            'pizzas' => $this->pizzas = $this->pizzaRepository->getPizzasPaginate(8)
        ];
        return view('livewire.pizza-list', $viewAttributes);
    }
}
