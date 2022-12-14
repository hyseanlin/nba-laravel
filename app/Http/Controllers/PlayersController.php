<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlayerRequest;
use App\Models\Player;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayersController extends Controller
{
    public function index()
    {
        $players = Player::paginate(25); //Player::all();
        $positions = Player::allPositions()->get();
        $data = [];
        foreach ($positions as $position)
        {
            $data["$position->position"] = $position->position;
        }        
        return view('players.index', ['players' => $players, 'positions'=>$data, 'showPagination' => true]);
    }

    public function api_players()
    {
        return Player::all();
    }


    public function api_update(Request $request)
    {
        $player = Player::find($request->input('id'));
        if ($player == null)
        {
            return response()->json([
                'status' => 0,
            ]);
        }
        $player->name = $request->input('name');
        $player->tid = $request->input('tid');
        $player->position = $request->input('position');
        $player->height = $request->input('height');
        $player->weight = $request->input('weight');
        $player->year = $request->input('year');
        $player->nationality = $request->input('nationality');

        if ($player->save())
        {
            return response()->json([
                'status' => 1,
            ]);
        } else {
            return response()->json([
                'status' => 0,
            ]);
        }
    }

    public function api_delete(Request $request)
    {
        $player = Player::find($request->input('id'));

        if ($player == null)
        {
            return response()->json([
                'status' => 0,
            ]);
        }

        if ($player->delete())
        {
            return response()->json([
                'status' => 1,
            ]);
        }
    }
    public function senior()
    {
        $players = Player::senior()->get();
        $positions = Player::allPositions()->get();
        $data = [];
        foreach ($positions as $position)
        {
            $data["$position->position"] = $position->position;
        }
        return view('players.index', ['players' => $players, 'positions'=>$data, 'showPagination' => false]);
    }

    public function position(Request $request)
    {
        $players = Player::position($request->input('pos'))->get();

        $positions = Player::allPositions()->get();
        $data = [];
        foreach ($positions as $position)
        {
            $data["$position->position"] = $position->position;
        }
        return view('players.index', ['players' => $players, 'positions'=>$data, 'showPagination' => false]);
    }
    public function create()
    {
        $tags = Team::orderBy('teams.id', 'asc')->pluck('teams.name', 'teams.id');
        return view('players.create', ['teams' =>$tags, 'teamSelected' => null]);
    }

    public function edit($id)
    {
        $player = Player::findOrFail($id);
        $tags = Team::orderBy('teams.id', 'asc')->pluck('teams.name', 'teams.id');
        $selected_tags = $player->team->id;
        return view('players.edit', ['player' =>$player, 'teams' => $tags, 'teamSelected' => $selected_tags]);
    }

    public function show($id)
    {
        $player = Player::findOrFail($id);
        $team = Team::findOrFail($player->tid);

        return view('players.show', ['player' => $player, 'team_name' => $team->name]);
    }

    public function store(CreatePlayerRequest $request)
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
    public function update($id, CreatePlayerRequest $request)
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
