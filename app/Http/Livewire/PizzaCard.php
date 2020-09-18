<?php

namespace App\Http\Livewire;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderedPizzaController;
use App\Services\PizzaRepository;
use Livewire\Component;

class PizzaCard extends Component
{
    public int $pizzaId;
    public int $toppingId = 1;
    public int $sizeId = 1;
    public int $quantity = 1;

    protected $listeners = ['currencyChanged'];
    protected $rules = [
        'sizeId' => 'integer',
        'toppingId' => 'integer',
        'quantity' => 'integer'
    ];
    private PizzaRepository $pizzaRepository;

    public function render(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;

        $order = OrderController::getBySessionId();
        $pizza = $this->pizzaRepository->getPizzas()->find($this->pizzaId);
        $toppings = $this->pizzaRepository->getPizzaToppings();
        $sizes = $this->pizzaRepository->getPizzaSizes();
        $currencies = $this->pizzaRepository->getCurrencies();
        // price
        $price =
            $pizza->basic_price
            * $sizes->find($this->sizeId)->price_factor
            * $this->quantity;
        $price += $toppings->find($this->toppingId)->basic_price;
        $price *= $currencies->find($order->currency_id)->price_factor;
        $price = round($price, 2);

        return view('livewire.pizza-card', [
            'toppings' => $toppings,
            'sizes' => $sizes,
            'currencies' => $currencies,
            'order' => $order,
            'pizza' => $pizza,
            'price' => $price
        ]);
    }

    public function updatedToppingId(int $value)
    {
    }

    public function updatedSizeId(int $value)
    {
    }

    public function updatedQuantity($value)
    {
    }

    public function submit(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;
        $this->validate();

        OrderedPizzaController::createOrderedPizza(
            OrderController::getBySessionId()->id,
            $this->pizzaRepository->getPizzas()->find($this->pizzaId)->id,
            $this->pizzaRepository->getPizzaToppings()->find($this->toppingId)->id,
            $this->pizzaRepository->getPizzaSizes()->find($this->sizeId)->id,
            $this->quantity
        );

        $this->emit('addPizza');
    }

    public function currencyChanged()
    {
    }
}
