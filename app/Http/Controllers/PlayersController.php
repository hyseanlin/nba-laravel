<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlayerRequest;
use App\Models\Player;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PlayersController extends Controller
{
    public function index()
    {
        $players = Player::paginate(25); //Player::all();
        $positions = Player::allPositions()->pluck('players.position', 'players.position');
        return view('players.index', ['players' => $players, 'positions'=>$positions, 'selectedPosition'=>null]);
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
        $players = Player::senior()->paginate(25);
        $positions = Player::allPositions()->pluck('players.position', 'players.position');
        return view('players.index', ['players' => $players, 'positions'=>$positions, 'selectedPosition'=>null]);
    }

    public function position(Request $request)
    {
        $players = Player::position($request->input('pos'))->paginate(25);
        $positions = Player::allPositions()->pluck('players.position', 'players.position');
        $selectedPostion = $request->input('pos');
        return view('players.index', ['players' => $players, 'positions'=>$positions, 'selectedPosition'=>$selectedPostion]);
    }
    public function create()
    {
        $tags = Team::orderBy('teams.id', 'asc')->pluck('teams.name', 'teams.id');
        return view('players.create', ['teams' =>$tags, 'teamSelected' => null]);
    }

    public function edit($id)
    {
        parent::edit($id);

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
        $data = $request->only([
            'name',
            'tid',
            'position',
            'height',
            'weight',
            'year',
            'nationality',            
        ]);        
        $observation = Player::create($data);
        return redirect('players');
    }
    public function update($id, CreatePlayerRequest $request)
    {
        if (Gate::allows('user'))
            abort(401);

        $player = Player::findOrFail($id);

        $data = $request->only([
            'name',
            'tid',
            'position',
            'height',
            'weight',
            'year',
            'nationality',            
        ]);    

        $player->fill($data);

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
