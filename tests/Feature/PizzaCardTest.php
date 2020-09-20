<?php

namespace Tests\Feature;

use App\Http\Controllers\OrderedPizzaController;
use App\Models\Order;
use App\Models\OrderedPizza;
use App\Models\Pizza;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class PizzaCardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function setFirstOrderSessionTest()
    {
        $this->seed();

        $response = $this->get('/');

        $response->assertSessionHas('order_id', 1);
    }

    /** @test */
    public function createFirstOrderTest()
    {
        $this->seed();

        $response = $this->get('/');

        $this->assertTrue(Order::where('id', 1)->exists());
    }

    /** @test */
    public function fillInCheckoutFormTest()
    {
        $this->seed();

        $response = $this->get('/');

        $response = $this->get('/checkout');

        Livewire::test('checkout')
            ->set('name', 'Alex')
            ->set('address', 'улица пушкина дом колотушкина')
            ->set('comments', 'no comments')
            ->call('changePaymentMethod', 2)
            ->call('changeDeliveryMethod', 2)
            ->call('checkout')
            ->assertSee('Thank you! We\'re already cooking ');

        $this->assertEquals('Alex', Order::first()->name);
        $this->assertEquals('улица пушкина дом колотушкина', Order::first()->address);
        $this->assertEquals('no comments', Order::first()->comments);
        $this->assertEquals(2, Order::first()->payment_id);
        $this->assertEquals(2, Order::first()->delivery_method_id);
    }

    /** @test */
    public function basketTest()
    {
        $this->seed();

        $response = $this->get('/');

        $order = Order::first();
        $orderedPizzas = OrderedPizza::where('order_id', $order->id);

        OrderedPizzaController::createOrderedPizza(
            $order->id,
            Pizza::first()->id,
            1,
            1,
            2
        );

        Livewire::test('basket')
            ->assertSee('Steak & Blue Cheese');
    }
}
