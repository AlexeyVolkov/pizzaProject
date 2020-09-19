<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class OrderHistoryLogin extends Component
{
    public string $signUpEmail;
    public string $logInEmail;
    public string $signUpPassword;
    public string $logInPassword;

    protected $rules = [
        'logInEmail' => 'required|email|unique:users',
        'logInEmail' => 'required|email|unique:users',
        'password' => 'required|min:6|same:passwordConfirmation',
    ];

    public function render()
    {
        return view('livewire.order-history-login');
    }

    public function register()
    {
        User::create([
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
    }
}
