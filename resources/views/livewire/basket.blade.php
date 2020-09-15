<div class="table-responsive">
    <table class="table table-dark table-hover ">
        <caption>{{ __('Pizzas in basket') }}</caption>
        <thead>
        <tr>
            <th scope="col">Pizza</th>
            <th scope="col">Topping</th>
            <th scope="col">Size</th>
            <th scope="col">Quantity</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ordered_pizzas as $ordered_pizza)
{{--            @dd($ordered_pizza)--}}
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
</div>