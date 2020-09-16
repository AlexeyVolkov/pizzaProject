<select wire:model="order.currency_id" wire:click="currencyChanged" name="currency" id="currency">
    @foreach($currencies as $currency)
        <option value="{{ $currency->id }}">{{ $currency->name }}</option>
    @endforeach
</select>