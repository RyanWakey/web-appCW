<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //hardcoded Comment
       $c = new Comment;
       $c->description = "This is comment 1";
       $c->user_id = 1;
       $c->post_id = 1;
       $c->save();
       
       //hardcoded Comment 2
        $c2 = new Comment;
       $c2->description = "This is comment 2";
       $c2->user_id = 1;
       $c2->post_id = 1;
       $c2->save(); 

       // Creates 40 comments with random data
       // Comment::factory()->count(40)->create();
    }
}
