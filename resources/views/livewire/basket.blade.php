<section class="pt-2 pb-1">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">{{ __('Cart') }}</span>
    </h4>
    <ul class="list-group">
        @foreach($orderedPizzas as $ordered_pizza)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">{{ $pizzas->find($ordered_pizza->pizza_id)->name }}</h6>
                    <small class="text-muted">
                        {{ $toppings->find($ordered_pizza->topping_id)->name }},
                        {{ $sizes->find($ordered_pizza->size_id)->name }}
                    </small>
                </div>
                <span class="text-muted">
                        <i class="{{ $currencies->find($order->currency_id)->icon_class }}"></i>
                        {{
                            round(
                                    (
                                        (
                                            $pizzas->find($ordered_pizza->pizza_id)->basic_price
                                            * $sizes->find($ordered_pizza->size_id)->price_factor
                                            * $ordered_pizza->quantity
                                        )
                                        + $toppings->find($ordered_pizza->topping_id)->basic_price
                                    )
                                    * $currencies->find($order->currency_id)->price_factor,
                                2)
                        }}
                    <button
                            wire:click.prevent="removePizzaFromBasket({{ $ordered_pizza->id }})"
                            type="button"
                            class="btn btn-link ml-1">
                    <i class="fas fa-trash"></i>
                        </button>
                    </span>
            </li>
        @endforeach
    </ul>
    <button
            wire:click="checkout"
            type="button"
            class="btn btn-primary btn-block mt-2">
        <i class="fas fa-cash-register"></i>
        {{ __('Proceed to payment') }}
    </button>
</section>