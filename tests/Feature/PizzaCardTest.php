<?php

namespace Tests\Feature;

use App\Http\Controllers\OrderedPizzaController;
use App\Models\Currency;
use App\Models\DeliveryMethod;
use App\Models\Order;
use App\Models\OrderedPizza;
use App\Models\Payment;
use App\Models\Pizza;
use App\Models\PizzaSize;
use App\Models\PizzaTopping;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class PizzaCardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function seedingTest()
    {
        $this->seed(DatabaseSeeder::class);

        $this->assertEquals(3, Currency::count());
        $this->assertEquals(2, DeliveryMethod::count());
        $this->assertEquals(3, Payment::count());
        $this->assertEquals(14, Pizza::count());
        $this->assertEquals(4, PizzaSize::count());
        $this->assertEquals(4, PizzaTopping::count());
    }

    /** @test */
    public function setFirstOrderSessionTest()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->get('/');

        $response->assertSessionHas('order_id', 1);
    }

    /** @test */
    public function confirmRedirectTest()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->get('/');

        $response = $this->get('/checkout');

        Livewire::test('checkout')
            ->call('checkout')
            ->assertRedirect('/order-confirmed');
    }

    /** @test */
    public function createFirstOrderTest()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->get('/');

        $this->assertTrue(Order::where('id', 1)->exists());
    }

    /** @test */
    public function fillInCheckoutFormTest()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->get('/');

        $response = $this->get('/checkout');

        Livewire::test('checkout')
            ->set('order.name', 'Alex')
            ->set('order.address', 'улица пушкина дом колотушкина')
            ->set('order.comments', 'no comments')
            ->call('changePaymentMethod', 2)
            ->call('changeDeliveryMethod', 2)
            ->call('checkout')
            ->assertRedirect('/order-confirmed');

        $this->assertEquals('Alex', Order::first()->name);
        $this->assertEquals('улица пушкина дом колотушкина', Order::first()->address);
        $this->assertEquals('no comments', Order::first()->comments);
        $this->assertEquals(2, Order::first()->payment_id);
        $this->assertEquals(2, Order::first()->delivery_method_id);
    }

    /** @test */
    public function basketTest()
    {
        $this->seed(DatabaseSeeder::class);

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
