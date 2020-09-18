<div>
    <nav class="list-group list-group-horizontal currency-switch">
        @foreach($currencies as $currency)
            <a href="#{{ $currency->name }}"
               class="currency-switch__item list-group-item list-group-item-action {{ $currencyId == $currency->id ? 'list-group-item-dark active' : '' }}"
            wire:click.prevent="currencyChange({{ $currency->id }})">
                {{ $currency->name }}
            </a>
        @endforeach
    </nav>
</div>