<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use App\Services\PizzaRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class PizzaList extends Component
{
    public Collection $toppings;
    public Collection $currencies;
    public Collection $delivery_methods;
    public Collection $sizes;
    public Order $order;
    public int $orderId;
    protected $listeners = ['currencyChanged'];
    private PizzaRepository $pizzaRepository;

    public function mount(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;

        $this->sizes = $this->pizzaRepository->getPizzaSizes();
        $this->toppings = $this->pizzaRepository->getPizzaToppings();
        $this->currencies = $this->pizzaRepository->getCurrencies();
        $this->delivery_methods = $this->pizzaRepository->getDeliveryMethods();
        $this->orderId = session('order_id');
    }

    public function render(PizzaRepository $pizzaRepository)
    {
        $this->pizzaRepository = $pizzaRepository;

        $this->updateOrder();

        $viewAttributes = [
            'pizzas' => $this->pizzaRepository->getPizzasPaginate(8)
        ];
        return view('livewire.pizza-list', $viewAttributes);
    }

    public function updateOrder()
    {
        $this->order = Order::find($this->orderId);
    }

    public function currencyChanged()
    {
        $this->updateOrder();
    }
}
