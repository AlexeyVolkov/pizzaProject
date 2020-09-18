<?php

namespace App\Http\Livewire;

use App\Http\Controllers\OrderedPizzaController;
use App\Models\Currency;
use App\Models\Order;
use App\Models\Pizza;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use App\Services\PizzaRepository;

class PizzaCard extends Component
{
    public int $topping_id = 1;
    public int $size_id = 1;
    public float $price;
    public int $quantity = 1;
    public Pizza $pizza;
    public Collection $toppings;
    public Collection $sizes;
    public Collection $currencies;
    public Order $order;
    protected $listeners = ['currencyChanged'];
    private PizzaRepository $pizzaRepository;

    protected $rules = [
        'size_id' => 'integer',
        'topping_id' => 'integer',
        'quantity' => 'integer'
    ];

    public function mount(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;

        $this->toppings = $this->pizzaRepository->getPizzaToppings();
        $this->sizes = $this->pizzaRepository->getPizzaSizes();
        $this->currencies = $this->pizzaRepository->getCurrencies();
        $this->order = Order::find(session('order_id'));
    }

    public function render()
    {
        $this->updatePrice();

        return view('livewire.pizza-card', [
            'toppings' => $this->toppings,
            'sizes' => $this->sizes
        ]);
    }

    public function updatePrice()
    {
        $this->price =
            $this->pizza->basic_price
            * $this->sizes->find($this->size_id)->price_factor
            * $this->quantity;

        $this->price += $this->toppings->find($this->topping_id)->basic_price;
        $this->price *= $this->currencies->find($this->order->currency_id)->price_factor;
        $this->price = round($this->price, 2);
    }

    public function updatedToppingId(int $value)
    {
        $this->updatePrice();
    }

    public function updatedSizeId(int $value)
    {
        $this->updatePrice();
    }

    public function updatedQuantity($value)
    {
        $this->updatePrice();
    }

    public function submit()
    {
        $this->validate();

        OrderedPizzaController::createOrderedPizza(
            $this->order->id,
            $this->pizza->id,
            $this->toppings->find($this->topping_id)->id,
            $this->sizes->find($this->size_id)->id,
            $this->quantity
        );
        $this->emit('addPizza');
    }

    public function currencyChanged()
    {
        $this->updatePrice();
    }
}
