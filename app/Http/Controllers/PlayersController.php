<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayersController extends Controller
{
    public function index()
    {
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
                'players.nationality')
            ->get();
        return view('players.index', ['players' => $players]);
    }

    public function senior()
    {
        $players = Player::where('year', '>', 10)->orderBy('year')->get();
        return view('players.senior', ['players' => $players]);
    }

    public function create()
    {
        $teams = DB::table('teams')
            ->select('teams.id', 'teams.name')
            ->orderBy('teams.id', 'asc')
            ->get();

        $data = [];
        foreach ($teams as $team)
        {
            $data[$team->id] = $team->name;
        }
        return view('players.create', ['teams' =>$data]);
    }

    public function edit($id)
    {
        $teams = DB::table('teams')
            ->select('teams.id', 'teams.name')
            ->orderBy('teams.id', 'asc')
            ->get();

        $data = [];
        foreach ($teams as $team)
        {
            $data[$team->id] = $team->name;
        }

        $player = Player::findOrFail($id);

        return view('players.edit', ['player' =>$player, 'teams' => $data]);
    }

    public function show($id)
    {
        $player = Player::findOrFail($id);
        $team = Team::findOrFail($player->tid);

        return view('players.show', ['player' => $player, 'team_name' => $team->name]);
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
