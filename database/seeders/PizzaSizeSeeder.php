<?php

namespace Database\Seeders;

use App\Models\PizzaSize;
use Illuminate\Database\Seeder;

class PizzaSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PizzaSize::create([
            'name' => 'Original',
            'price_factor' => 1
        ]);

        PizzaSize::create([
            'name' => 'Small',
            'price_factor' => 0.75
        ]);

        PizzaSize::create([
            'name' => 'Big',
            'price_factor' => 1.25
        ]);

        PizzaSize::create([
            'name' => 'Extreme',
            'price_factor' => 1.75
        ]);
    }
}
