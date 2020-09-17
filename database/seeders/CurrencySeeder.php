<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([
            'name' => 'USD',
            'price_factor' => 1,
            'icon_class' => 'fas fa-dollar-sign'
        ]);

        Currency::create([
            'name' => 'EUR',
            'price_factor' => 1.18,
            'icon_class' => 'fas fa-euro-sign'
        ]);

        Currency::create([
            'name' => 'RUB',
            'price_factor' => 74.85,
            'icon_class' => 'fas fa-ruble-sign'
        ]);
    }
}
