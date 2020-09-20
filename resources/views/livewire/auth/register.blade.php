<form wire:submit.prevent="register" class="form-signin col-12 col-md-6" action="#" method="POST">
    <div class="text-center">
        <h2 class="h3 mb-3 font-weight-normal">{{ __('Sign up') }}</h2>
    </div>
    <div class="form-group">
        <label for="inputName" class="sr-only">{{ __('Name') }}</label>
        <input wire:model.lazy="name" type="text" id="inputName" class="form-control" placeholder="John"
               autocomplete="name"
               required>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="inputEmail" class="sr-only">{{ __('Email address ') }}</label>
        <input wire:model.lazy="email" type="email" id="inputEmail" class="form-control" placeholder="john@doe.com"
               autocomplete="email"
               required>
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="inputPassword" class="sr-only">{{ __('Password') }}</label>
        <input wire:model.lazy="password" type="password" id="inputPassword" class="form-control"
               autocomplete="new-password"
               placeholder="{{ __('Password') }}"
               required>
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <button class="btn btn-lg btn-secondary btn-block" type="submit">{{ __('Sign up') }}</button>
    </div>
</form>