<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
         'description' => fake()->sentences($nbSentences = 2, $asText = true),
         'user_id' => fake()->numberBetween(1,User::get()->count()),
         'post_id' => fake()->numberBetween(1,Post::get()->count()),
        ];
    }
}
