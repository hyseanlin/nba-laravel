<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function generateRandomString($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function generateRandomName() {
        $first_name = $this->generateRandomString(rand(2, 15));
        $first_name = strtolower($first_name);
        $first_name = ucfirst($first_name);
        $last_name = $this->generateRandomString(rand(2, 15));
        $last_name = strtolower($last_name);
        $last_name = ucfirst($last_name);
        $name = $first_name . " ". $last_name;
        return $name;
    }
    public function generateRandomPosition() {
        $positions = ['控球後衛', '得分後衛', '後衛', '前鋒', '小前鋒', '大前鋒','中鋒'];
        return $positions[rand(0, count($positions)-1)];

    }

    public function generateRandomNationality() {
        $positions = ['美國', '土耳其', '法國', '印度', '非洲', '中國', '塞爾維亞', '英國', '台灣'];
        return $positions[rand(0, count($positions)-1)];

    }
    public function run()
    {
        for ($i=0; $i<500; $i++)
        {
            $name = $this->generateRandomName();
            $position = $this->generateRandomPosition();
            $nationality = $this->generateRandomNationality();
            $random_datetime = Carbon::now()->subMinutes(rand(1, 55));
            $birthdate = Carbon::now()->subYears(rand(48, 60))->subMonths(rand(0, 12))->subRealDays(rand(0,31));
            $onboarddate = Carbon::now()->subYears(rand(18, 30))->subMonths(rand(0, 12))->subRealDays(rand(0,31));
            DB::table('players')->insert([
                'name' => $name,
                'tid' => rand(1, 25),
                'birthdate' => $birthdate,
                'onboarddate' => $onboarddate,
                'position' => $position,
                'height' => rand(165, 220),
                'weight' => rand(80, 120),
                'year' => rand(1, 15),
                'nationality' => $nationality,
                'created_at' => $random_datetime,
                'updated_at' => $random_datetime
            ]);
        }
    }
}
