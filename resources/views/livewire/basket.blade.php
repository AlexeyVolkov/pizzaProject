<div>
    <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">{{ __('Your cart') }}</span>
        <span class="badge badge-secondary badge-pill">{{ $ordered_pizzas->count() }}</span>
    </h4>
    <ul class="list-group list-group-flush">
        @forelse($ordered_pizzas as $ordered_pizza)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $pizzas[$ordered_pizza->pizza_id]->name }}
                <span class="badge badge-primary badge-pill">{{ $ordered_pizza->quantity }}</span>
                <span class="text-muted">{{ $pizzas[$ordered_pizza->pizza_id]->basic_price * $toppings[$ordered_pizza->topping_id]->price_factor * $sizes[$ordered_pizza->size_id]->price_factor }}</span>
            </li>
        @empty
            <p>No Pizzas yet</p>
        @endforelse
    </ul>
</div>