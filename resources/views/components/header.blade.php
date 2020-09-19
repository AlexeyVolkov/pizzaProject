<header id="top">
    <div class="collapse bg-dark" id="basket">
        <div class="container">
            <livewire:basket/>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <div class="col col-12 col-md-4 text-center text-md-left">
            <a href="{{ route('home') }}" class="navbar-brand text-center text-md-right">
                <i class="fas fa-pizza-slice mr-2"></i>
                <strong>{{ $title }}</strong>
            </a>
            </div>
            <div class="col col-12 col-md-1 text-center mb-2 mb-md-0">
                <livewire:currency-switch/>
            </div>
            <div class="col col-12 col-md-4 text-center text-md-right">
                <livewire:basket-button/>
            </div>
        </div>
    </div>
</header>
