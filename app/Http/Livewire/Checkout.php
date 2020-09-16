<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderedPizza;
use App\Services\PizzaRepository;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Checkout extends Component
{
    public string $deliveryMethod = 'delivery';
    public string $name = '';
    public string $address = '';
    public string $comments = '';
    public int $paymentId = 1;
    public Collection $payments;
    public Collection $ordered_pizzas;
    public Order $order;

    protected $rules = [
        'name' => 'string',
        'address' => 'exclude_if:deliveryMethod,carryout|required|min:6',
        'comments ' => 'string',
    ];

    private $pizzaRepository;

    public function mount(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;
        $this->payments = $this->pizzaRepository->getPayments();
        $this->ordered_pizzas = OrderedPizza::where('order_id', $this->order_id)->get();

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
