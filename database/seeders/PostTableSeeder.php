<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //hardcoded post
        $p = new Post;
        $p->title = "Pizza or Burger";
        $p->description = "Burger better";
        $p->member_id = 1;
        $p->save();

        //hardcoded post 2
        $p2 = new Post;
        $p2->title = "Burger or Pizza";
        $p2->description = "better Burger";
        $p2->member_id = 1;
        $p2->save(); 

        // Creates 40 posts with random data
        // Post::factory()->count(40)->create();

        // Creates 38 Posts with 2 to 4 comments each seeding.
        // Post::factory()->has(Comment::factory()->count(random_int(2,4))->count(38)->create();
    }
}
