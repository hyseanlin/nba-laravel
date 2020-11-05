<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    //
    public function index()
    {
        $player = Player::where('height', '>', 178)->first()->toArray();

        return view('players.index', $player);
    }

    public function create()
    {
        $player = Player::create([
            'name'=>'陳彥達',
            'tid'=>3,
            'position'=>'中鋒',
            'height'=>180,
            'weight'=>75,
            'year'=>12,
            'nationality'=>'台灣',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()]);

        return view('players.create', $player->toArray());
    }

    public function edit($id)
    {
        if ($id == 5)
        {
            $player_name = "Sean";
            $player_country = "Taiwan";
            $player_position = "中鋒";
        } else {
            $player_name = "NBA 球員名字";
            $player_country = "USA";
            $player_position = "前鋒";
        }
        $data = compact('player_name', 'player_country', 'player_position');

        return view('players.edit', $data);
    }

    public function show($id)
    {
        $temp = Player::where('position', '小前鋒')->first();
        if ($temp == null)
            return "No record";

        $player = $temp->toArray();

        return view('players.show', $player);
    }
}
