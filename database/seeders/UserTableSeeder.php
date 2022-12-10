<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            //hardcoded user
            $u = new User;
            $u->name = "FrankMan";
            $u->email = "Frank100@email.com";
            $u->password = "Secret123";
            $u->save();
    
            //hardcoded user2
            $u2 = new User;
            $u2->name = "BenzO";
            $u2->email = "benz@email.com";
            $u2->password = "Notsecret123";
            $u2->save();
    
            // Creates 40 users with random data
            // User::factory()->count(40)->creat();
            
            //Creates factory relationship between User, Posts and Comments.  
            User::factory()->has(Post::factory()->has(Comment::factory() -> count(random_int(2,4))) 
                -> count(random_int(2,3)))->count(38)->create();   
    }
}
