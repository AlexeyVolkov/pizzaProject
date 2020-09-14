<?php

namespace App\Http\Livewire;

use App\Models\Currency;
use App\Models\DeliveryMethod;
use App\Models\Order;
use App\Models\OrderedPizza;
use App\Models\Payment;
use App\Models\Pizza;
use App\Models\PizzaSize;
use App\Models\PizzaTopping;
use Livewire\Component;

class Basket extends Component
{
    public $order_id;
    public $viewAttributes;

    protected $listeners = ['addPizza', 'removePizza'];

    public function mount()
    {
        $this->order_id = Order::find(session('order_id'))->id;
    }

    public function render()
    {
        $this->updateViewAttributes();
        return view('livewire.basket', $this->viewAttributes);
    }

    public function updateViewAttributes()
    {
        $ordered_pizzas = OrderedPizza::where('order_id', $this->order_id)->get();
        $this->viewAttributes = [
            'ordered_pizzas' => $ordered_pizzas,
            'pizzas' => Pizza::get(),
            'sizes' => PizzaSize::get(),
            'toppings' => PizzaTopping::get(),
            'payments' => Payment::get(),
            'currencies' => Currency::all(),
            'delivery_methods' => DeliveryMethod::get()
        ];
    }

    public function addPizza()
    {
        $this->updateViewAttributes();
    }

    public function removePizza()
    {
        $this->updateViewAttributes();
    }
}
