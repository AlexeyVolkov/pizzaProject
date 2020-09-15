<x-app title="{{  __('Shopping cart') }}">
    <div class="py-5 bg-light">
        <div class="container">
            <div class="py-5 text-center">
                <h2>
                    <i class="fas fa-pizza-slice mr-2"></i>
                    {{ __('Checkout form') }}
                </h2>
            </div>

            <livewire:checkout/>

        </div>
    </div>
</x-app>
