<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Services\PizzaRepository;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CurrencySwitch extends Component
{
    public Collection $currencies;
    public int $currencyId = 1;
    public Order $order;
    private $pizzaRepository;

    public function mount(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;

        $this->currencies = $this->pizzaRepository->getCurrencies();
        $this->order = Order::find(session('order_id'));
    }

    public function render()
    {
        $this->currencyId = $this->order->currency_id;
        return view('livewire.currency-switch');
    }

    public function currencyChange(int $value)
    {
        $value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
        $this->order->update(['currency_id' => $value]);

        $this->emit('currencyChanged');
    }
}
