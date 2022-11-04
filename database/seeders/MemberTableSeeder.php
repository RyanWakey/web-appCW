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
        $m = new Member;
        $m->username = "BenzO";
        $m->email = "benz@email.com";
        $m->password = "notsecret";
        $m->save();

        Member::factory()->count(8)->create();
    }
}
