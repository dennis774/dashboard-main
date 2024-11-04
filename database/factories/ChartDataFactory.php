<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChartData>
 */
class ChartDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'total_category_sale' => fake()->numberBetween(1, 20),

            // 'category' => fake()->randomElement(['Pending', 'Milktea','Fruit Tea','Coffee','Meals',
            // 'Pastries','Drinks','Frappe','Fries','Discounted Pastries','Combo Meals',
            // 'Wizardly Drinks','Special Drinks','Latte Series','ALLEGRO','Hot Coffee Based',
            // 'Iced Coffee Based','Non-Coffee','Matcha Series','Frappuccino','Iced Coffee Series',]),

            // 'created_at' => fake()->dateTimeBetween('2000-01-01', '2010-12-30')->format('Y-m-d'),

        ];
    }
}
