<button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#basket"
        aria-controls="basket"
        aria-expanded="false"
        aria-label="Toggle navigation"
>
    <i class="fas fa-shopping-cart"></i>
    @if ($pizza_number>0)
        <span class="badge badge-dark">
            {{ $pizza_number }}
            {{ __('pizzas in basket') }}
        </span>
    @endif
</button>