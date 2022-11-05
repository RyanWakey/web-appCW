<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Member;

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

        $p2 = new Post;
        $p2->title = "Burger or Pizza";
        $p2->description = "better Burger";
        $p2->member_id = 1;
        $p2->save();
        
        
        
        
    }
}
