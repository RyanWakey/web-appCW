<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\User;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //hardcoded profile
        $p = new Profile;
        $p->display_name = "lankyfranky";
        $p->first_name = "Frank";
        $p->last_name = "Thomas";
        $p->bio = "I am very tall";
        $p->user_id= 1;
        $p->save();
        
        //hardcoded profile 2
        $p2 = new Profile;
        $p2->display_name = "benza";
        $p2->first_name = "ben";
        $p2->last_name = "za";
        $p2->bio = "my bio";
        $p2->user_id = 2;
        $p2->save();

        // -2 as we already have 2 defined.
        Profile::factory()->count(User::get()->count()-2)->create();
    }
}
