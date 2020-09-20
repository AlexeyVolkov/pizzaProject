<form wire:submit.prevent="login" class="form-signin col-12 col-md-6">
    <div class="text-center">
        <h2 class="h3 mb-3 font-weight-normal">{{ __('Log in') }}</h2>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="sr-only">{{ __('Email address ') }}</label>
        <input wire:model="email" type="email" id="inputEmail" class="form-control" placeholder="john@doe.com"
               autocomplete="email"
               required
               autofocus>
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="inputPassword" class="sr-only">{{ __('Password') }}</label>
        <input wire:model.lazy="password" type="password" id="inputPassword" class="form-control"
               placeholder="{{ __('Password') }}"
               autocomplete="password"
               required>
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Log in') }}</button>
    </div>
</form>