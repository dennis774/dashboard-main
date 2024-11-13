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
            'print_sales' => $printSales = fake()->numberBetween(2500, 5000),
            'merch_sales' => $merchSales = fake()->numberBetween(2500, 5000),
            'custom_sales' => $customSales = fake()->numberBetween(2500, 5000),
            'total_sales' => $totalSales = $printSales + $merchSales + $customSales,
            'cash' => $cash = fake()->numberBetween(0.5 * $totalSales, 0.8 * $totalSales), // 50%-80% of total sales
            'gcash' => $gcash = $totalSales - $cash,
            'print_expenses' => $printExpenses = fake()->numberBetween(1000, 5000),
            'merch_expenses' => $merchExpenses = fake()->numberBetween(1000, 5000),
            'custom_expenses' => $customExpenses = fake()->numberBetween(1000, 5000),
            'total_expenses' => $printExpenses + $merchExpenses + $customExpenses,
            'date' => fake()->dateTimeBetween('2023-01-01', '2024-12-30')->format('Y-m-d')
        ];
    }
}
