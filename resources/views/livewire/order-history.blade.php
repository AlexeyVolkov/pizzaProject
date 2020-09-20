<div class="container">
    <ul class="nav justify-content-center">
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('home') }}">{{ __('Menu') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled active" href="{{ route('order-history') }}" tabindex="-1"
               aria-disabled="true">{{ __('Order history') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">{{ __('Log out') }}</a>
        </li>
    </ul>
    <div class="row">
        <div class="table-responsive">
        <table class="table table-borderless table-hover table-sm ">
            <caption>{{ __('Order history') }}</caption>
            <thead class="">
            <tr>
                <th scope="col">{{ __('Date') }}</th>
                <th scope="col">{{ __('Pizzas') }}</th>
                <th scope="col">{{ __('Comments') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{ date("d M Y, H:i", strtotime($order->created_at)) }}</th>
                    <td>
                        <ul class="list-group mb-3">
                            @foreach($ordered_pizzas->where('order_id', $order->id) as $ordered_pizza)
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">
                                            {{ $pizzas->find($ordered_pizza->pizza_id)->name }}
                                            @if ($ordered_pizza->quantity > 1)
                                                <span class="badge badge-secondary ml-2">{{ $ordered_pizza->quantity }}</span>
                                            @endif
                                        </h6>
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
                                <span>{{ __('Total') }} ({{ $currencies->find($order->currency_id)->name }})</span>
                                <strong>
                                    <i class="{{ $currencies->find($order->currency_id)->icon_class }}"></i>
                                    {{ $totalPrices[$order->id] }}
                                </strong>
                            </li>
                        </ul>
                    </td>
                    <td>
                        <ul class="list-group">
                            @if (!empty($order->name))
                                <li class="list-group-item">
                                    <i class="fas fa-user mr-2"></i>
                                    {{ $order->name }}
                                </li>
                            @endif
                            @if (!empty($order->address))
                                <li class="list-group-item">
                                    <i class="fas fa-map-marked-alt mr-2"></i>
                                    {{ $order->address }}
                                </li>
                            @endif
                            @if (!empty($order->comments))
                                <li class="list-group-item">
                                    <i class="fas fa-comment-alt mr-2"></i>
                                    {{ $order->comments }}
                                </li>
                            @endif
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>