<?php

namespace Database\Factories;

use Dotenv\Util\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description'=>fake()->text(),
            'latitude'=>rand(0,90000000)/1000000,
            'longitude'=>rand(0,90000000)/1000000,
            'place_category_id'=>rand(1,5),
            'average_rating'=>0
        ];
    }
}
