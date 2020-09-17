<select wire:model="currencyId" name="currency" id="currency" class="form-control col-md-1">
    @foreach($currencies as $currency)
        <option value="{{ $currency->id }}" @if ($currencyId == $loop->iteration) selected @endif >{{ $currency->name }}</option>
    @endforeach
</select>