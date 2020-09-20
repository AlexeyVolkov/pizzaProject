<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
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
        Livewire::test('auth.register')
            ->set('name', 'Caleb Porzio')
            ->set('email', 'calebporzio@gmail.com')
            ->set('password', 'password')
            ->call('register')
            ->assertStatus(200);

        $this->assertTrue(User::whereEmail('calebporzio@gmail.com')->exists());
        $this->assertEquals('calebporzio@gmail.com', auth()->user()->email);
    }

    /** @test */
    function email_is_required()
    {
        Livewire::test('auth.register')
            ->set('name', 'Caleb Porzio')
            ->set('email', '')
            ->set('password', 'password')
            ->call('register')
            ->assertHasErrors(['email' => 'required']);
    }

    /** @test */
    function email_is_valid_email()
    {
        Livewire::test('auth.register')
            ->set('name', 'Caleb Porzio')
            ->set('email', 'calebporzio')
            ->set('password', 'password')
            ->call('register')
            ->assertHasErrors(['email' => 'email']);
    }

    /** @test */
    function email_hasnt_been_taken_already()
    {
        User::create([
            'name' => 'Caleb Porzio',
            'email' => 'calebporzio@gmail.com',
            'password' => Hash::make('password'),
        ]);

        Livewire::test('auth.register')
            ->set('name', 'Caleb Porzio')
            ->set('email', 'calebporzio@gmail.com')
            ->set('password', 'password')
            ->call('register')
            ->assertHasErrors(['email' => 'unique']);
    }

    /** @test */
    function password_is_minimum_of_six_characters()
    {
        Livewire::test('auth.register')
            ->set('name', 'Caleb Porzio')
            ->set('email', 'calebporzio@gmail.com')
            ->set('password', 'secre')
            ->call('register')
            ->assertHasErrors(['password' => 'min']);
    }
}
