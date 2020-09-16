<div class="row">
    <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
            @foreach($ordered_pizzas as $ordered_pizza)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">Product name</h6>
                    <small class="text-muted">Brief description</small>
                </div>
                <span class="text-muted">$12</span>
            </li>
            @endforeach
            <li class="list-group-item d-flex justify-content-between bg-light">
                <div class="text-success">
                    <h6 class="my-0">Promo code</h6>
                    <small>EXAMPLECODE</small>
                </div>
                <span class="text-success">-$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <span>Total (USD)</span>
                <strong>$20</strong>
            </li>
        </ul>

        <form class="card p-2">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Promo code">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary">Redeem</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Delivery</h4>

        <div class="list-group">
            <a wire:click="changeDeliveryMethod('delivery')" href="#delivery"
               class="list-group-item list-group-item-action {{  'delivery' === $deliveryMethod ? 'active' : '' }}">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Delivery</h5>
                    <small><i class="far fa-clock mr-2"></i>~ 20 min</small>
                </div>
            </a>
            <a wire:click="changeDeliveryMethod('carryout')" href="#carryout"
               class="list-group-item list-group-item-action {{  'carryout' === $deliveryMethod ? 'active' : '' }}">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Carry out</h5>
                    <small><i class="fas fa-tag mr-2"></i>-10% off</small>
                </div>
            </a>
        </div>

        <form class="needs-validation mt-2">
            @if ('delivery' === $deliveryMethod)
                <div class="mb-3">
                    <label for="firstName">Name</label>
                    <input wire:model="name" type="text" class="form-control" id="firstName" placeholder="Ivan"
                           value="">
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input wire:model="address" type="text" class="form-control" id="address" placeholder="Lenina 45">
                </div>

                <div class="mb-3">
                    <label for="comments">Comments</label>
                    <textarea wire:model="comments" class="form-control" id="comments" rows="3"
                              placeholder="Intercom code is #43"></textarea>
                </div>
            @endif
            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
                @foreach($payments as $payment)
                    <div class="custom-control custom-radio">
                        <input wire:model="paymentId" id="paymentMethod{{ $payment->id }}" name="paymentMethod"
                               type="radio"
                               class="custom-control-input"
                               value="{{ $payment->id }}"
                               required>
                        <label class="custom-control-label"
                               for="paymentMethod{{ $payment->id }}">{{ $payment->name }}</label>
                    </div>
                @endforeach
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Finish checkout</button>
        </form>
    </div>
</div>