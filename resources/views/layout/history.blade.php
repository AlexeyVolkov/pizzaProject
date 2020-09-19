<x-app title="{{  __('Order history') }}">
    @if (!Auth::check())
        <livewire:order-history-login/>
    @endif
    @if (Auth::check())
logged in
    @endif
</x-app>
