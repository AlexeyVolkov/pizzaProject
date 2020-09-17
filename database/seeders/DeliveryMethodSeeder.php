<?php

namespace Database\Seeders;

use App\Models\DeliveryMethod;
use Illuminate\Database\Seeder;

class DeliveryMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeliveryMethod::create([
            'name' => 'Delivery',
            'price_factor' => 1.1
        ]);

        DeliveryMethod::create([
            'name' => 'Carry Out',
            'price_factor' => 0.9
        ]);
    }
}
