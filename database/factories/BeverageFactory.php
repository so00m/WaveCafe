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
            'price'=>fake()->randomFloat(2, 5, 15),
            'category_id'=>fake()->numberBetween(1,3),
            'published' =>fake()->boolean(),
            'special' =>fake()->boolean(),
            'image' => fake()->randomElement(['1720861982','1720862020','1720862053' ,'1720862104']).'-png',   
                                //image('public/assets/images', 640, 480, 'cats'),
                                //image(null,640, 480)
        ];
    }
}
