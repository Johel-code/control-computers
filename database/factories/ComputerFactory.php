<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Computer>
 */
class ComputerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'serial' => $this->faker->unique()->numberBetween(10000,99999),
            'marca' => $this->faker->randomKey([
                'Apple' => 1,
                'Hp' => 2,
                'Lenovo'=> 3,
                'Dell'=> 4,
                'Acer'=> 5,
                'Asus'=> 6,
            ]),
            'image' => $this->faker->image(null, 640, 480),
            'state_id' => $this->faker->numberBetween(1,4)
        ];
    }
}
