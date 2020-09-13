<div class="row">
    @foreach ($pizzas as $pizza)
        <livewire:pizza-card :pizza="$pizza" :key="$pizza->id">
    @endforeach
</div>
<div class="row">
    {{ $pizzas->links() }}
</div>