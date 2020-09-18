<button
        class="btn btn-secondary"
        type="button"
        data-toggle="collapse"
        data-target="#basket"
        aria-controls="basket"
        aria-expanded="false"
        aria-label="Toggle navigation"
        title="{{ $pizzaNumber }} {{ $pizzaNumber > 2 ? 'pizzas' : 'pizza' }}"
>
    {{ __('Open cart') }}
    @if ($pizzaNumber>0)
        <span class="badge badge-light">
            {{ $pizzaNumber }}
        </span>
    @endif
</button>