<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
    @foreach ($pizzas as $pizza)
        <livewire:pizza-card :pizza="$pizza" :toppings="$toppings" :sizes="$sizes" :key="$pizza->id">
    @endforeach
</div>
<div class="row">
    {{ $pizzas->links() }}
</div>