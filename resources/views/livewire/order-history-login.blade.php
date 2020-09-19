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
        <form class="form-signin col-12 col-md-6">
            <div class="text-center">
                <h2 class="h3 mb-3 font-weight-normal">{{ __('Log in') }}</h2>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="sr-only">{{ __('Email address ') }}</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="john@doe.com" required
                       autofocus>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="sr-only">{{ __('Password') }}</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="{{ __('Password') }}"
                       required>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" value="remember-me"> {{ __('Remember me') }}
                </label>
            </div>
            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Log in') }}</button>
            </div>
        </form>
        <form wire:submit.prevent="register" class="form-signin col-12 col-md-6">
            <div class="text-center">
                <h2 class="h3 mb-3 font-weight-normal">{{ __('Sign up') }}</h2>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="sr-only">{{ __('Email address ') }}</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="john@doe.com" required>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="sr-only">{{ __('Password') }}</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="{{ __('Password') }}"
                       required>
            </div>
            <div class="form-group">
                <button class="btn btn-lg btn-secondary btn-block" type="submit">{{ __('Sign up') }}</button>
            </div>
        </form>
    </div>
</div>