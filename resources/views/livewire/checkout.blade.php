<div class="row">
    <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">{{ __('Your cart') }}</span>
            <span class="badge badge-secondary badge-pill">{{ $orderedPizzas->count() }}</span>
        </h4>
        <ul class="list-group mb-3">
            @foreach($orderedPizzas as $ordered_pizza)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{ $pizzas->find($ordered_pizza->pizza_id)->name }}</h6>
                        <small class="text-muted">
                            {{ $toppings->find($ordered_pizza->topping_id)->name }},
                            {{ $sizes->find($ordered_pizza->size_id)->name }}
                        </small>
                    </div>
                    <span class="text-muted">
                        <i class="{{ $currencies->find($order->currency_id)->icon_class }}"></i>
                        {{
                            round(
                                    (
                                        (
                                            $pizzas->find($ordered_pizza->pizza_id)->basic_price
                                            * $sizes->find($ordered_pizza->size_id)->price_factor
                                            * $ordered_pizza->quantity
                                        )
                                        + $toppings->find($ordered_pizza->topping_id)->basic_price
                                    )
                                    * $currencies->find($order->currency_id)->price_factor,
                                2)
                        }}
                    </span>
                </li>
            @endforeach
            <li class="list-group-item d-flex justify-content-between bg-light">
                <div class="text-secondary">
                    <h6 class="my-0">
                        <i class="fas fa-truck"></i>
                        {{ $deliveryMethods->find($order->delivery_method_id)->name }}
                    </h6>
                </div>
                <span class="text-secondary">{{ $deliveryMethods->find($order->delivery_method_id)->price_factor * 100 - 100 }}%</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
                <div class="text-secondary">
                    <h6 class="my-0">
                        <i class="fas fa-money-bill-wave"></i>
                        {{ $payments->find($order->payment_id)->name }}
                    </h6>
                </div>
                <span class="text-secondary">{{ $payments->find($order->payment_id)->price_factor * 100 - 100}}%</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <span>Total ({{ $currencies->find($order->currency_id)->name }})</span>
                <strong>
                    <i class="{{ $currencies->find($order->currency_id)->icon_class }}"></i>
                    {{ $totalPrice }}
                </strong>
            </li>
        </ul>
    </div>
    <div class="col-md-8 order-md-1">
        <h4 class="mb-3">
            <i class="fas fa-truck"></i>
            {{ __('Delivery') }}
        </h4>

        <div class="list-group">
            @foreach ($deliveryMethods as $deliveryMethod)
                <a wire:click.prevent="changeDeliveryMethod({{ $deliveryMethod->id }})"
                   href="#delivery{{ $deliveryMethod->name }}"
                   class="list-group-item list-group-item-action @if ($order->delivery_method_id == $deliveryMethod->id) active @endif">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $deliveryMethod->name }}</h5>
                        <small>{{ $deliveryMethod->price_factor * 100 - 100 }}%</small>
                    </div>
                </a>
            @endforeach
        </div>

        <form wire:submit.prevent="checkout" class="needs-validation mt-2" name="checkout">
            @if (1 == $order->delivery_method_id)
                <div class="mb-3">
                    <label for="firstName">
                        <i class="fas fa-user"></i>
                        {{ __('Name') }}
                    </label>
                    <input wire:model.lazy="order.name" type="text" class="form-control" id="firstName"
                           placeholder="Ivan"
                           value="">
                </div>
                <div class="mb-3">
                    <label for="address">
                        <i class="fas fa-map-marked-alt"></i>
                        {{ __('Address') }}
                    </label>
                    <input wire:model.lazy="order.address" type="text" class="form-control" id="address"
                           placeholder="Lenina 45">
                </div>

                <div class="mb-3">
                    <label for="comments">
                        <i class="fas fa-comment-alt"></i>
                        {{ __('Comments') }}
                    </label>
                    <textarea wire:model.lazy="order.comments" class="form-control" id="comments" rows="3"
                              placeholder="Intercom code is #43"></textarea>
                </div>
            @endif
            <hr class="mb-4">

            <h4 class="mb-3">
                <i class="fas fa-money-bill-wave"></i>
                {{ __('Payment') }}
            </h4>

            <div class="d-block my-3">
                @foreach($payments as $payment)
                    <div class="custom-control custom-radio">
                        <input wire:click.prevent="changePaymentMethod({{ $payment->id }})"
                               id="paymentMethod{{ $payment->id }}" name="paymentMethod"
                               type="radio"
                               class="custom-control-input"
                               value="{{ $payment->id }}"
                               @if ($order->payment_id == $payment->id) checked @endif
                               required>
                        <label class="custom-control-label"
                               for="paymentMethod{{ $payment->id }}">{{ $payment->name }}</label>
                    </div>
                @endforeach
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">
                {{ __('Finish checkout') }}
            </button>
        </form>
    </div>
</div>