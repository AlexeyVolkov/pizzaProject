<div class="table-responsive">
    <table class="table table-dark table-hover py-5">
        <caption>{{ __('Pizzas in basket') }}</caption>
        <thead>
        <tr>
            <th scope="col">{{ __('Pizza') }}</th>
            <th scope="col">{{ __('Topping') }}</th>
            <th scope="col">{{ __('Size') }}</th>
            <th scope="col">{{ __('Quantity') }}</th>
            <th scope="col">{{ __('Actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ordered_pizzas as $ordered_pizza)
            <livewire:basket-item
                    :orderedPizza="$ordered_pizza"
                    :test_me="4"
                    :pizza="$pizzas[$ordered_pizza->pizza_id]"
                    :topping="$toppings[$ordered_pizza->topping_id]"
                    :size="$sizes[$ordered_pizza->size_id]"
                    :key="$loop->index"
            />
        @endforeach
        </tbody>
    </table>
    <button
            wire:click="checkout"
            type="button"
            class="btn btn-secondary btn-block"
    >
        <i class="fas fa-cash-register"></i>
        {{ __('Proceed to payment') }}
    </button>
</div>