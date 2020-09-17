<?php

namespace Database\Seeders;

use App\Models\Pizza;
use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pizza::create([
            'name' => 'Steak & Blue Cheese',
            'image_path' => 'https://storage.pizzapizza.ca/phx2/ppl_images/products/en/2x/11970.png',
            'description' => 'Topped with garlic spread base, steak strips, fresh mushrooms, mozzarella cheese and sprinkled with crumbles of blue cheese',
            'basic_price' => 12.29
        ]);

        Pizza::create([
            'name' => 'Steak & Blue Cheese',
            'image_path' => 'https://storage.pizzapizza.ca/phx2/ppl_images/products/en/2x/11970.png',
            'description' => 'Topped with garlic spread base, steak strips, fresh mushrooms, mozzarella cheese and sprinkled with crumbles of blue cheese',
            'basic_price' => 12.29
        ]);
    }
}
