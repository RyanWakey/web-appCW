<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Like;

class LikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $l1 = new Like;
        $l1->user_id = 1;
        $l1->save();

        $l2 = new Like;
        $l2->user_id = 2;
        $l2->save();

    }
}
