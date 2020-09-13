<?php

namespace App\Http\Livewire;

use App\Models\Currency;
use App\Models\Pizza;
use App\Models\Customer;
use App\Models\DeliveryMethod;
use App\Models\Payment;
use App\Models\PizzaSize;
use App\Models\PizzaTopping;
use Livewire\Component;

class ShowPizzas extends Component
{
    public function render()
    {
        $viewAttributes = [
            'pizzas' => Pizza::paginate(8),
            'toppings' => PizzaTopping::get(),
            'sizes' => PizzaSize::get(),
            'payments' => Payment::get(),
            'currencies' => Currency::all(),
            'delivery_methods' => DeliveryMethod::get(),
        ];
        return view('livewire.show-pizzas', $viewAttributes);
    }
}
