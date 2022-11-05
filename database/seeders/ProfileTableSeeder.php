<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

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
        $p->member_id = 1;
        $p->save();

        Profile::factory()->count(8)->create();
    }
}
