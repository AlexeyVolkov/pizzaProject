<div class="col mb-4">
    <div class="card {{ $added ? 'border-secondary' : '' }}">
        <form action="/" wire:submit.prevent="submit">
            <div class="card-header text-center">
                {{ $pizza->name }}
            </div>
            <img src="{{ $pizza->image_path }}" class="card-img-top" alt="{{ $pizza->name }}">
            <div class="card-body">
                <p class="card-text text-center">{{ $pizza->description }}</p>
                <hr>
                <div class="form-group">
                    <select wire:model="size_id" class="form-control form-control-sm"
                            id="selectSize_{{ $pizza->id }}"
                            name="size"
                            title="{{ __('Pizza size') }}"
                            {{ $added ? 'disabled' : '' }}>
                        @foreach ($sizes as $size)
                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select wire:model="topping_id" class="form-control form-control-sm"
                            id="selectTize_{{ $pizza->id }}"
                            name="topping"
                            title="{{ __('Pizza topping') }}"
                            {{ $added ? 'disabled' : '' }}>
                        @foreach ($toppings as $topping)
                            <option value="{{ $topping->id }}">{{ $topping->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input wire:model="quantity" type="number" class="form-control form-control-sm"
                           id="inputQuantity_{{ $pizza->id }}"
                           name="quantity" placeholder="1" min="1" max="25" value="1"
                           title="{{ __('Quantity') }}"
                            {{ $added ? 'disabled' : '' }}>
                </div>
            </div>
            <div class="card-footer text-muted">
                <div class="row align-items-end">
                    <div class="col-sm-12 col-md-4 mb-2 text-center text-md-left">
                        <strong><span class="currency">$</span>{{ $price }}</strong>
                    </div>
                    <div class="col-sm-12 col-md-8">
                        <button
                                wire:click="submit"
                                type="submit"
                                class="btn btn-outline-primary btn-sm btn-block"
                                {{ $added ? 'disabled' : '' }}
                        >
                            {{ $button_message }}
                            <i class="fas fa-plus small"></i>
                        </button>

                        @if ($added)
                            <button
                                    wire:click="resetSubmit"
                                    type="reset"
                                    class="btn btn-outline-primary btn-sm btn-block"
                            >
                                {{ __('Remove from basket') }}
                                <i class="fas fa-times"></i>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>