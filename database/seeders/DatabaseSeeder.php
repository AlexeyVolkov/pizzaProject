<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\DeliveryMethod;
use App\Models\Payment;
use App\Models\Pizza;
use App\Models\PizzaSize;
use App\Models\PizzaTopping;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Pizza::factory(10)->create();
        PizzaSize::factory(5)->create();
        PizzaTopping::factory(20)->create();
        Payment::factory(3)->create();
        DeliveryMethod::factory(2)->create();
        Currency::factory(3)->create();
    }
}
