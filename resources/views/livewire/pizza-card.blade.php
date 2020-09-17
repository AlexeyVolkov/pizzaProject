<div class="col mb-4">
    <div class="card">
        <form action="/" wire:submit.prevent="submit" id="pizza_form_{{ $pizza->id }}">
            <div class="card-header text-center">
                {{ $pizza->name }}
            </div>
            <img src="{{ $pizza->image_path }}" class="card-img-top" alt="{{ $pizza->name }}">
            <div class="card-body">
                <p class="card-text text-justify">{{ $pizza->description }}</p>
                <hr>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <i class="input-group-text fas fa-ruler-combined"></i>
                    </div>
                    <select wire:model="size_id" class="form-control form-control-sm custom-select"
                            id="selectSize_{{ $pizza->id }}"
                            name="size"
                            title="{{ __('Pizza size') }}">
                        @foreach ($sizes as $size)
                            @if ($loop->first)
                                <optgroup label="{{ __('Pizza size') }}">
                                    @endif
                                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                                    @if ($loop->last)
                                </optgroup>>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <i class="input-group-text fas fa-pepper-hot"></i>
                    </div>
                    <select wire:model="topping_id" class="form-control form-control-sm custom-select"
                            id="selectTize_{{ $pizza->id }}"
                            name="topping"
                            title="{{ __('Pizza topping') }}">
                        @foreach ($toppings as $topping)
                            @if ($loop->first)
                                <optgroup label="{{ __('Pizza topping') }}">
                                    @endif
                                    <option value="{{ $topping->id }}">{{ $topping->name }}</option>
                                    @if ($loop->last)
                                </optgroup>>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <i class="input-group-text fas fa-sort-numeric-up-alt"></i>
                    </div>
                    <input wire:model="quantity" type="number" class="form-control form-control-sm"
                           id="inputQuantity_{{ $pizza->id }}"
                           name="quantity" placeholder="1" min="1" max="25" value="1"
                           title="{{ __('Quantity') }}">
                </div>
            </div>
            <div class="card-footer text-muted">
                <div class="row align-items-end">
                    <div class="col-sm-12 col-md-4 mb-2 text-center text-md-left">
                        <strong>
                            <span class="currency">
                                <i class="{{ $currencies->find($order->currency_id)->icon_class }}"></i>
                            </span>
                            {{ $price }}
                        </strong>
                    </div>
                    <div class="col-sm-12 col-md-8">
                        <button
                                type="submit"
                                class="btn btn-outline-dark btn-sm btn-block"
                                title="Add pizza to shopping cart"
                        >
                            <i class="fas fa-cart-plus"></i>
                            {{ __('Add') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>