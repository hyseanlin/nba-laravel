<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('players')->insert([
            'name' => '金柏毅',
            'tid' => 1,
            'position' => '小前鋒',
            'height' => 176,
            'weight' => 65,
            'year' => 3,
            'nationality' => '台灣'
        ]);
        DB::table('players')->insert([
            'name' => '林學億',
            'tid' => 2,
            'position' => '中鋒',
            'height' => 171,
            'weight' => 77,
            'year' => 3,
            'nationality' => '台灣'
        ]);
    }
}
