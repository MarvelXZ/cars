<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'brand'=> $this->faker->randomElement(['Skoda','Volkswagen','Mercedes', 'Audi', 'Porsche', 'Ford']),
            'model'=> $this->faker->word(),
            'year'=> $this->faker->date(),
            'max_speed'=> $this->faker->numberBetween(120,360),
            'is_automatic'=> $this->faker->boolean(),
            'engine'=> $this->faker->randomElement(['Petrol', 'Electric', 'Diesel', 'Hybrid']),
            'number_of_doors'=> $this->faker->numberBetween(2,6),
        ];
    }
}
