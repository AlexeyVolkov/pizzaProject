<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function registration_page_contains_login_and_register_component()
    {
        $this->seed();

        $this->get(route('order-history'))
            ->assertSuccessful()
            ->assertSeeLivewire('auth.login')
            ->assertSeeLivewire('auth.register');
    }

    /** @test */
    function can_register()
    {
        $this->seed();

        Livewire::test('auth.register')
            ->set('name', 'Caleb Porzio')
            ->set('email', 'calebporzio@gmail.com')
            ->set('password', 'password')
            ->call('register')
            ->assertStatus(200);

        $this->assertTrue(User::whereEmail('calebporzio@gmail.com')->exists());
        $this->assertEquals('calebporzio@gmail.com', auth()->user()->email);
    }
}
