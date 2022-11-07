<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Member;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence($nbWords = 8, $variableNbWords = true),
            'description' => fake()->sentences($nbSentences = 3, $asText = true),
            'member_id' => fake()->numberBetween(1,Member::get()->count()),
        ];
    }
}
