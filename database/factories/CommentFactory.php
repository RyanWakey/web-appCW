<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\Member;
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
         'member_id' => fake()->numberBetween(1,Member::get()->count()),
         'post_id' => fake()->numberBetween(1,Post::get()->count()),
        ];
    }
}
