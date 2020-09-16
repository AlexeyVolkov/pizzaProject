<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use App\Services\PizzaRepository;

class CurrencySwitch extends Component
{
    public Collection $currencies;
    public Order $order;

    private $pizzaRepository;

    protected $rules = [
        'order.currency_id' => 'integer'
    ];

    public function mount(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;

        $this->currencies = $this->pizzaRepository->getCurrencies();

        $this->order = Order::find(session('order_id'));
    }

    public function render()
    {
        return view('livewire.currency-switch');
    }

    public function currencyChanged()
    {
        $this->validate();
        
        $this->order->save();
    }
}
