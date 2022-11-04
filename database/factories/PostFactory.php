<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
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
        // $table->id();
        //     $table->string('title');
        //     $table->string('description');
        //     $table->bigInteger('member_id')->unsigned();
        //     $table->timestamps();
           
        //     $table->foreign('member_id')->references('id')->on('members')
        //         ->onDelete('cascade')->onUpdate('cascade');
    {
        return [
            'title' => fake()->sentence($nbWords = 8, $variableNbWords = true),
            'description' => fake()->sentences($nbSentences = 3, $asText = false),
        ];
    }
}
