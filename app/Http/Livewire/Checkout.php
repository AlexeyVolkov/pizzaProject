<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class Checkout extends Component
{
    public string $deliveryMethod = 'delivery';
    public Order $order;

    public function mount()
    {
        $this->order = Order::find(session('order_id'));
    }

    public function render()
    {
        return view('livewire.checkout');
    }

    public function changeDeliveryMethod(string $method)
    {
        switch ($method) {
            case 'delivery':
                $this->deliveryMethod = 'delivery';
                break;
            case 'carryout':
                $this->deliveryMethod = 'carryout';
                break;
        }
    }
}
