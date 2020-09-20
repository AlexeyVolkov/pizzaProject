<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\OrderedPizza;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class PizzaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function hompage_has_pizza_list_component()
    {
        $this->seed();

        $this->get(route('home'))
            ->assertSuccessful()
            ->assertSeeLivewire('pizza-list');
    }

    /** @test */
    function order_set()
    {
        $this->seed();

        $response = $this->get('/');

        $this->assertTrue(Order::where('id', 1)->exists());
    }
}
