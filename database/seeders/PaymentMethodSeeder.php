<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create([
            'name' => 'Bank Card',
            'price_factor' => 1.03
        ]);

        Payment::create([
            'name' => 'Cash',
            'price_factor' => 1
        ]);

        Payment::create([
            'name' => 'Bitcoin',
            'price_factor' => 1.5
        ]);
    }
}
