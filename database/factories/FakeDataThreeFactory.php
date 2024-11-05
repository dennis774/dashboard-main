<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FakeDataThree>
 */
class FakeDataThreeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'orders' => $orders = fake()->numberBetween(10, 50),
            'cash' => $cash = fake()->numberBetween(2500, 5000),
            'gcash' => $gcash = fake()->numberBetween(2500, 5000),
            'sales' => $cash + $gcash,
            'expenses' => fake()->numberBetween(1000, 5000),
            'date' => fake()->dateTimeBetween('2024-01-01', '2024-11-30')->format('Y-m-d')
        ];
    }
}
