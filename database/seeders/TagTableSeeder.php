<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Post;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag1 = new Tag;
        $tag1->name = "Scary";
        $tag1->save();
        $tag1->posts()->attach(1);
        $tag1->posts()->attach(15);
        
        $tag2 = new Tag;
        $tag2->name = "Art";
        $tag2->save();
        $tag2->posts()->attach(1);
        $tag2->posts()->attach(28);
       
        Tag::factory()->count(10)->create();
        Post::factory()->has(Tag::factory()->count(3))->count(10)->create();

    }
}
