<x-app title="{{  __('Menu') }}">
    <x-header title="{{  __('Menu') }}"></x-header>

    <main role="main">
        <div class="album py-5 bg-light">
            <div class="container">
                @livewire('pizza-list')
            </div>
        </div>

    </main>

    <x-footer></x-footer>
</x-app>
