<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'brand' => $this->faker->word(),
            'model' => $this->faker->word(),
            'year' => $this->faker->year('-2 years'),
            'driver_id' => $this->faker->randomNumber(1,10),
        ];
    }
}
