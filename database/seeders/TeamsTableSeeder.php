<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsTableSeeder extends Seeder
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
    public function generateRandomZone() {
        $zones = ['東區', '西區'];
        return $zones[rand(0, count($zones)-1)];
    }
    public function generateRandomCity() {
        $cities = [
            '伯明罕',
            '安克拉治',
            '鳳凰城',
            '小岩城',
            '洛杉磯',
            '丹佛',
            '橋港',
            '威明頓',
            '傑克孫維',
            '亞特蘭大',
            '檀香山',
            '波夕',
            '芝加哥',
            '印第安納波利斯',
            '狄蒙',
            '威奇托',
            '路易維爾',
            '紐奧良',
            '波特蘭',
            '巴爾的摩',
            '波士頓',
            '底特律',
            '明尼亞波利斯',
            '傑克森',
            '堪薩斯城',
            '比靈斯',
            '奧馬哈',
            '拉斯維加斯',
            '曼徹斯特',
            '紐華克',
            '阿布奎基',
            '紐約',
            '夏洛特',
            '法哥',
            '哥倫布',
            '奧克拉荷馬市',
            '波特蘭',
            '費城',
            '普羅維登斯',
            '哥倫比亞',
            '蘇瀑',
            '曼非斯',
            '休斯頓',
            '鹽湖城',
            '伯靈頓',
            '維吉尼亞海灘',
            '西雅圖',
            '查爾斯頓',
            '密爾沃基',
            '夏安'
        ];
        return $cities[rand(0, count($cities)-1)];
    }
    public function run()
    {
        for ($i=0; $i<25; $i++) {
            $name = $this->generateRandomName();
            $city = $this->generateRandomCity();
            $zone = $this->generateRandomZone();
            $home = $city . "球場";
            $random_datetime = Carbon::now()->subMinutes(rand(1, 55));

            DB::table('teams')->insert([
                'name' => $name,
                'zone' => $zone,
                'city' => $city,
                'home' => $home,
                'created_at' => $random_datetime,
                'updated_at' => $random_datetime
            ]);
        }
    }
}
