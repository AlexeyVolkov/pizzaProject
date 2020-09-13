<?php

namespace Database\Factories;

use App\Models\Pizza;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class PizzaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pizza::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'image_path' => Storage::url('images/buffalo-chicken-pizza.png'),
            'description' => $this->faker->sentence,
            'basic_price' => $this->faker->randomFloat(2, 1, 65),
        ];
    }
}
