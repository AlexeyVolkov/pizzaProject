<?php

namespace App\Http\Livewire;

use App\Http\Controllers\OrderController;
use App\Models\Order;
use App\Services\PizzaRepository;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CurrencySwitch extends Component
{
    public int $currencyId = 1;
    private $pizzaRepository;

    public function render(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;
        $order = OrderController::getBySessionId();
        $this->currencyId = $order->currency_id;

        return view('livewire.currency-switch', [
            'currencies' => $this->pizzaRepository->getCurrencies(),
        ]);
    }

    public function currencyChange(int $value)
    {
        $value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
        OrderController::getBySessionId()->update(['currency_id' => $value]);

        $this->emit('currencyChanged');
    }
}
