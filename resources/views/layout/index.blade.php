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
        <div class="container">
            <p class="float-right">
                <a href="{{ route('checkout') }}" class="navbar-brand d-flex align-items-center">
                    <i class="fas fa-cash-register"></i>
                    &nbsp;
                    {{ __('Proceed to payment') }}
                </a>
            </p>
        </div>
    </footer>
</x-app>
