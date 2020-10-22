<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'name' => '資訊網路工程系',
            'zone' => '工程學院',
            'city' => '桃園市',
            'home' => '天空操場'
        ]);
        DB::table('teams')->insert([
            'name' => '應用外語系',
            'zone' => '商學院',
            'city' => '桃園市',
            'home' => '星形廣場'
        ]);
    }
}
