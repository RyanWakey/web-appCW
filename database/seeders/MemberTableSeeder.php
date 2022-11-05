<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;

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

        //hardcoded member
        $m2 = new Member;
        $m2->username = "BenzO";
        $m2->email = "benz@email.com";
        $m2->password = "notsecret";
        $m2->save();

        Member::factory()->count(28)->create();
    }
}
