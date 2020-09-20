<x-app title="{{  __('Order history') }}">
    @guest
        <div class="container mt-2">
            <div class="row">
                <p class="mt-5 mb-3 text-muted">
                    <a href="{{ route('home') }}" title="{{ __('Choose pizzas') }}">
                        <i class="fas fa-arrow-circle-left"></i>
                        {{ __('Back to pizzas') }}
                    </a>
                </p>
            </div>
            <div class="row justify-content-md-center">
                <livewire:auth.login/>
                <livewire:auth.register/>
            </div>
        </div>
    @endguest
    @auth
        <livewire:order-history/>
    @endauth
</x-app>
