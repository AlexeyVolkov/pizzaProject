<x-app title="{{  __('Menu') }}">
    <x-header title="{{  __('Menu') }}"></x-header>

    <main role="main">
        <div class="album py-5 bg-light">
            <div class="container">
                <livewire:pizza-list/>
            </div>
        </div>

    </main>

    <footer class="text-muted">
        <div class="container pt-2">
            <p class="float-right">
                <a href="{{ route('checkout') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-cash-register"></i>
                    {{ __('Proceed to payment') }}
                </a>
            </p>
            <p>
                <a href="{{ route('order-history') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-history"></i>
                    {{ __('Order history') }}
                </a>
            </p>
        </div>
    </footer>
</x-app>
