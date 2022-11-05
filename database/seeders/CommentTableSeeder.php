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
       $c->member_id = 1;
       $c->post_id = 1;
       $c->save();
       //hardcoded Comment

       $c2 = new Comment;
       $c2->description = "This is comment 2";
       $c2->member_id = 1;
       $c2->post_id = 1;
       $c2->save();


    }
}
