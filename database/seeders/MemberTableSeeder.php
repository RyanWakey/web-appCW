<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        $u = new Member;
        $u = "FrankMan";
        $u = "Frank100@email.com";
        $u = "secret";
        $u->save();
    }
}
