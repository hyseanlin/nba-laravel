<?php

namespace App\Http\Controllers;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    //
    public function index()
    {
        $n = Team::where('zone', "商學院")->count();

        return $n;//view('teams.index');
    }

    public function create()
    {
        $team = new Team;
        $team->name = "F728B";
        $team->zone = "北部";
        $team->city = "桃園";
        $team->home = "新莊體育場";
        $team->save();

        return view('teams.create');

    }

    public function edit($id)
    {
        $temp = Team::findOrFail($id);
        $temp->name = "F727";
        $temp->save();

        $team = $temp->toArray();

        return view('teams.edit')->with([
            'name'=>$team['name'],
            'city'=>$team['city'],
            'home'=>$team['home'],
            'zone'=>$team['zone']]);
    }

    public function show($id)
    {
        /*
        $temp = Team::find($id);
        if ($temp == null)
            return "No record";
        */
        $temp = Team::findOrFail($id);

        $team = $temp->toArray();
        return view('teams.show', $team);
    }
}
