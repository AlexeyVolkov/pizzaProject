<header id="top">
    <div class="collapse bg-dark show" id="basket">
        <div class="container">
            <livewire:basket/>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <i class="fas fa-pizza-slice mr-2"></i>
                <strong>{{ $title }}</strong>
            </a>
            <livewire:currency-switch/>
            <livewire:basket-button/>
        </div>
    </div>
</header>
