<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Member;
use App\Models\Post;
use App\Models\Comment;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //hardcoded member
        $m = new Member;
        $m->username = "FrankMan";
        $m->email = "Frank100@email.com";
        $m->password = "secret";
        $m->save();

        //hardcoded member2
        $m2 = new Member;
        $m2->username = "BenzO";
        $m2->email = "benz@email.com";
        $m2->password = "notsecret";
        $m2->save();

        // Creates 40 members with random data
        // Member::factory()->count(40)->creat();
        
        //Creates factory relationship between Members, Posts and Comments.  
        Member::factory()->has(Post::factory()->has(Comment::factory() -> count(random_int(2,4))) 
            -> count(random_int(2,3)))->count(38)->create();      
    }
}
