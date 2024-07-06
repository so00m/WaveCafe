<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beverage>
 */
class BeverageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' =>fake()-> word(),
            'content'=>fake()->sentence(),
            'price'=>fake()->numberBetween(2,4),
            'category_id'=>fake()->numberBetween(1,3),
            'published' =>fake()->boolean(),
            'special' =>fake()->boolean(),
            'image' => $this->faker->image('storage/app/public/beverages', 480, 640, null, false),
        ];
    }
}
