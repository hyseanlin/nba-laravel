<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayersController extends Controller
{
    public function index()
    {
        /*
        $players = Player::all()
            ->sortBy('players.id', SORT_ASC);
        */
        $players = DB::table('players')
            ->join('teams', 'players.tid', '=', 'teams.id')
            ->orderBy('players.id')
            ->select(
                'players.id',
                'players.name as pname',
                'teams.name as tname',
                'players.position',
                'players.height',
                'players.weight',
                'players.year',
                'players.nationality'
            )->get();
        return view('players.index', ['players' => $players]);
    }

    public function create()
    {
        return view('players.create');
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

    public function store(Request $request)
    {
        $name = $request->input('name');
        $tid = $request->input('tid');
        $position = $request->input('position');
        $height = $request->input('height');
        $weight = $request->input('weight');
        $year = $request->input('year');
        $nationality = $request->input('nationality');

        $player = Player::create([
            'name'=>$name,
            'tid'=>$tid,
            'position'=>$position,
            'height'=>$height,
            'weight'=>$weight,
            'year'=>$year,
            'nationality'=>$nationality]);
        return redirect('players');
    }
    public function update($id, Request $request)
    {
        $player = Player::findOrFail($id);

        $player->name = $request->input('name');
        $player->tid = $request->input('tid');
        $player->position = $request->input('position');
        $player->height = $request->input('height');
        $player->weight = $request->input('weight');
        $player->year = $request->input('year');
        $player->nationality = $request->input('nationality');
        $player->save();

        return redirect('players');
    }

    public function destroy($id)
    {
        $player = Player::findOrFail($id);
        $player->delete();
        return redirect('players');
    }
}
