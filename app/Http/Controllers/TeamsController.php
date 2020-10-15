<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamsController extends Controller
{
    //
    public function index()
    {
        return view('teams.index');
    }

    public function create()
    {
        return view('teams.create');

    }

    public function edit($id)
    {
        if ($id == 5)
        {
            $team_name = "LHU";
            $team_city = "Taoyuang";
            $team_field = "SKY Field";
        } else {
            $team_name = "NBA Team";
            $team_city = "USA City";
            $team_field = "USA　Field";
        }
        return view('teams.edit')->with(['name'=>$team_name, 'city'=>$team_city, 'field'=>$team_field]);
    }

    public function show($id)
    {
        $data = [];
        if ($id == 5)
        {
            $data['name'] = "LHU";
            $data['city'] = "Taoyuang";
            $data['field'] = "SKY Field";
        } else {
            $data['name'] = "NBA Team";
            $data['city'] = "USA City";
            $data['field'] = "USA　Field";
        }
        return view('teams.show', $data);
    }
}
