<div class="col mb-4">
    <div class="card h-100">
        <div class="card-header text-center">
            {{ $pizza->name }}
        </div>
        <img src="..." class="card-img-top" alt="{{ $pizza->name }}">
        <div class="card-body">
            <p class="card-text text-center">{{ $pizza->description }}</p>
            <hr>
            <div class="row row-cols-1 row-cols-xl-2 align-items-end">
                <div class="col">
                    <form>
                        <div class="form-group">
                            <select wire:model="size_id" class="form-control form-control-sm"
                                    id="selectSize_{{ $pizza->id }}"
                                    name="size"
                                    title="{{ __('Pizza size') }}">
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select wire:model="topping_id" class="form-control form-control-sm"
                                    id="selectTize_{{ $pizza->id }}"
                                    name="topping"
                                    title="{{ __('Pizza topping') }}">
                                @foreach ($toppings as $topping)
                                    <option value="{{ $topping->id }}">{{ $topping->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input wire:model="quantity" type="number" class="form-control form-control-sm"
                                   id="inputQuantity_{{ $pizza->id }}"
                                   name="quantity" placeholder="1" min="1" max="25" value="1"
                                   title="{{ __('Quantity') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <div class="row row-cols-1 row-cols-xl-2 align-items-end">
                <div class="col"><span class="currency">$</span>{{ $price }}</div>
                <div class="col">
                    <button type="submit" class="btn btn-outline-primary btn-sm btn-block">
                        {{ __('Add') }}
                        <i class="fas fa-plus small"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>