<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateTeamRequest;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TeamsController extends Controller
{

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
    //
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', ['teams'=>$teams]);
    }

    public function api_teams()
    {
        return Team::all();
    }

    public function api_update(Request $request)
    {
        $team = Team::find($request->input('id'));
        if ($team == null)
        {
            return response()->json([
                'status' => 0,
            ]);
        }

        $team->name = $request->input('name');
        $team->city = $request->input('city');
        $team->home = $request->input('home');
        $team->zone = $request->input('zone');
        if ($team->save())
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
        $team = Team::find($request->input('id'));

        if ($team == null)
        {
            return response()->json([
                'status' => 0,
            ]);
        }

        if ($team->delete())
        {
            return response()->json([
                'status' => 1,
            ]);
        }

    }

    public function western()
    {
        $teams = Team::zone('Western Conference')->get();
        return view('teams.index', ['teams'=>$teams]);
    }

    public function eastern()
    {
        $teams = Team::zone('Eastern Conference')->get();
        return view('teams.index', ['teams'=>$teams]);
    }

    public function create()
    {
        return view('teams.create');
    }

    public function edit($id)
    {
        parent::edit($id);

        $team = Team::findOrFail($id);
        return view('teams.edit', ['team'=>$team]);
    }

    public function show($id)
    {
        $team = Team::findOrFail($id);
        $players = $team->players;
        return view('teams.show', ['team'=>$team, 'players'=>$players]);
    }

    public function store(CreateTeamRequest $request)
    {
        $name = $request->input('name');
        $city = $request->input('city');
        $home = $request->input('home');
        $zone = $request->input('zone');

        Team::create([
            'name' => $name,
            'city' => $city,
            'home' => $home,
            'zone' => $zone,
            'created' => Carbon::now()
        ]);

        return redirect('teams');
    }
    public function update($id, CreateTeamRequest $request)
    {
        if (Gate::allows('user'))
            abort(401);

        $team = Team::findOrFail($id);

        $team->name = $request->input('name');
        $team->city = $request->input('city');
        $team->home = $request->input('home');
        $team->zone = $request->input('zone');
        $team->save();

        return redirect('teams');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return redirect('teams');
    }
}
