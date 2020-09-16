<x-app title="{{  __('Shopping cart') }}">
    <div class="py-5 bg-light">
        <div class="container">
            <div class="py-5 text-center">
                <small>
                    <a href="/" title="{{ __('Choose pizza') }}">
                    <i class="fas fa-arrow-circle-left"></i>
                    {{ __('Back to pizzas') }}
                    </a>
                </small>
                <h1>
                    <i class="fas fa-receipt"></i>
                    {{ __('Checkout') }}
                </h1>
            </div>

            <livewire:checkout/>

        </div>
    </div>
</x-app>
