<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Profile;
use App\Models\Member;
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
            'bio' => fake()->sentences($nbSentences = 3, $asText = true),
            
            //Already 2 hardcoded members with 2 hardcoded profiles, so range from 3 to rest of members.
            'member_id' => fake()->unique()->numberBetween(3,Member::get()->count()),
        ];
    }
}
