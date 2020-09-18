<x-app title="{{  __('Menu') }}">
    <x-header title="{{  __('Menu') }}"></x-header>

    <main role="main">
        <div class="album py-5 bg-light">
            <div class="container">
                <livewire:pizza-list/>
            </div>
        </div>

    </main>

    <footer>
        <div class="container text-center mt-2 mb-2">
            <a href="{{ route('checkout') }}" class="btn btn-outline-primary">
                <i class="fas fa-cash-register"></i>
                &nbsp;
                {{ __('Proceed to payment') }}
            </a>
        </div>
    </footer>
</x-app>
