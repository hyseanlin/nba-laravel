<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    //
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
    public function index()
    {
        $players = Player::all()->sortBy('id', SORT_ASC);

        return view('players.index', ['players' => $players]);
    }

    public function create()
    {
        $name = $this->generateRandomName();
        $position = $this->generateRandomPosition();
        $nationality = $this->generateRandomNationality();
        $random_datetime = Carbon::now()->subMinutes(rand(1, 55));

        $player = Player::create([
            'name'=>$name,
            'tid'=>rand(1, 25),
            'position'=>$position,
            'height'=>rand(165, 220),
            'weight'=>rand(80, 120),
            'year'=>rand(1, 15),
            'nationality'=>$nationality,
            'created_at'=>$random_datetime,
            'updated_at'=>$random_datetime]);

        return view('players.create', $player->toArray());
    }

    public function edit($id)
    {
        $player = Player::findOrFail($id)->toArray();

        return view('players.edit', $player);
    }

    public function show($id)
    {
        $player = Player::findOrFail($id)->toArray();
        return view('players.show', $player);
    }
}
