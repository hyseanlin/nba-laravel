<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayersController extends Controller
{
    //
    public function index()
    {
        return view('players.index');
    }

    public function create()
    {
        return view('players.create');
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
        return view('players.show')->with('player_id', $id);
    }
}
