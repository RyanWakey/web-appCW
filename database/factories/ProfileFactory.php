<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'display_name' => fake()->userName(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'date_of_birth' => fake()->date(),
            'bio' => fake()-sentences($nbSentences = 3, $asText = true);
            'member_id' =>  fake()->numberBetween(1,Member::get()->unique()->count()),
        ];
    }
}
