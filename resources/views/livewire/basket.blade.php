<div class="table-responsive">
    <table class="table table-dark table-hover py-5">
        <caption>{{ __('Pizzas in basket') }}</caption>
        <thead>
        <tr>
            <th scope="col">{{ __('Pizza') }}</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($ordered_pizzas as $ordered_pizza)
            <livewire:basket-item
                    :orderedPizza="$ordered_pizza"
                    :pizza="$pizzas->find($ordered_pizza->pizza_id)"
                    :topping="$toppings->find($ordered_pizza->topping_id)"
                    :size="$sizes->find($ordered_pizza->size_id)"
                    :key="$loop->index"
            />
        @endforeach
        </tbody>
    </table>
    <button
            wire:click="checkout"
            type="button"
            class="btn btn-secondary btn-block">
        <i class="fas fa-cash-register"></i>
        {{ __('Proceed to payment') }}
    </button>
</div>