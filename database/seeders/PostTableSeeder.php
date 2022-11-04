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
    }
}
