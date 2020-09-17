<select wire:model="currencyId" name="currency" id="currency">
    @foreach($currencies as $currency)
        <option value="{{ $currency->id }}">{{ $currency->name }}</option>
    @endforeach
</select>