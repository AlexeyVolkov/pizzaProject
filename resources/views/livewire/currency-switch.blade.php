<nav class="list-group list-group-horizontal currency-switch">
    @foreach($currencies as $currency)
        <a
                wire:click.prevent="currencyChange({{ $currency->id }})"
                href="#{{ $currency->name }}"
                class="currency-switch__item list-group-item list-group-item-action {{ $currencyId == $currency->id ? 'list-group-item-dark active' : '' }}"
                title="{{ $currency->name }}">
            <i class="{{ $currency->icon_class }}"></i>
        </a>
    @endforeach
</nav>