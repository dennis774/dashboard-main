<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FakeData>
 */
class FakeDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cash' => $cash = fake()->numberBetween(2500, 5000), // Adjust range as needed
            'gcash' => $gcash = fake()->numberBetween(2500, 5000), // Adjust range as needed
            'sales' => $cash + $gcash,
            'expenses' => fake()->numberBetween(1000, 5000),
            'date' => fake()->dateTimeBetween('2024-01-01', '2024-11-30')->format('Y-m-d')
        ];
        
    }
}
