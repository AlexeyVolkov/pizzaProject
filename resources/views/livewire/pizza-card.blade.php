<div class="card col-md-4">
    <img src="..." class="card-img-top" alt="{{ $pizza->name }}">
    <div class="card-body">
        <h5 class="card-title text-center">{{ $pizza->name }}</h5>
        <p class="card-text text-center">{{ $pizza->description }}</p>
        <div class="card-footer row">
            <div class="col">
                <form>
                    <div class="form-group">
                        <select class="form-control" id="selectSize_{{ $pizza->id }}" name="size"
                                title="{{ __('Pizza size') }}">
{{--                            @foreach ($sizes as $size)--}}
{{--                                <option value="{{ $size->id }}">{{ $size->name }}</option>--}}
{{--                            @endforeach--}}
                        </select>
                    </div>
                    <div class="form-group">
                        <select wire:model="topping_id" class="form-control" id="selectTize_{{ $pizza->id }}" name="topping"
                                title="{{ __('Pizza topping') }}">
                            @foreach ($toppings as $topping)
                                <option value="{{ $topping->id }}">{{ $topping->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="col text-right">
                <div class="col"><span class="currency">$</span>{{ $price }}</div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">
                        Add
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>