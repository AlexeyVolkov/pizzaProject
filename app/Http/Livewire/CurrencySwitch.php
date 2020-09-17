<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use App\Services\PizzaRepository;

class CurrencySwitch extends Component
{
    public Collection $currencies;
    public int $currencyId = 1;
    public Order $order;
    protected $rules = [
        'currencyId' => 'integer'
    ];
    private $pizzaRepository;

    public function mount(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;

        $this->currencies = $this->pizzaRepository->getCurrencies();
        $this->order = Order::find(session('order_id'));
        $this->currencyId = $this->order->currency_id;
    }

    public function render()
    {
        return view('livewire.currency-switch');
    }

    public function updatedCurrencyId()
    {
        $this->validate();

        Order::find(session('order_id'))->update(['currency_id' => $this->currencyId]);

        $this->emit('currencyChanged');
    }
}
