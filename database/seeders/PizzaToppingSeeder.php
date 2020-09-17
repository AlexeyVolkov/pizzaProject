<?php

namespace Database\Seeders;

use App\Models\PizzaTopping;
use Illuminate\Database\Seeder;

class PizzaToppingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PizzaTopping::create([
            'name' => 'Nothing',
            'basic_price' => 0
        ]);

        PizzaTopping::create([
            'name' => 'Fresh mushrooms',
            'basic_price' => 2
        ]);

        PizzaTopping::create([
            'name' => 'Jalapeno peppers',
            'basic_price' => 1.49
        ]);

        PizzaTopping::create([
            'name' => 'Pineapple',
            'basic_price' => 1
        ]);
    }
}
