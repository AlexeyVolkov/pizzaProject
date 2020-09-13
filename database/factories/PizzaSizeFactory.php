<?php

namespace Database\Factories;

use App\Models\PizzaSize;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PizzaSizeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PizzaSize::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'price_factor' => $this->faker->randomFloat(1, 1, 5)
        ];
    }
}
