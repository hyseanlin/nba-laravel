<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*------------------------------------------
 * 建立 NBA 「球隊(teams)」資源的所有 routing 及 view
 * function       routing (GET方法)       view 的名稱
 * 查詢            teams                  teams.index
 * 新增表單        teams/create             teams.create
 * 顯示單筆球隊資料 teams/{id}              teams.show
 * 修改表單        teams/{id}/edit          teams.edit
 ----------------------------------------*/
// 查詢
Route::get('teams', function () {
    return view('teams.index');
});
// 新增表單
Route::get('teams/create', function () {
    return view('teams.create');
});
// 顯示單筆球隊資料
Route::get('teams/{id}', function ($id) {
    if ($id ==5)
    {
        $team_name = "LHU";
        $team_city = "Taoyuang";
        $team_field = "Sky Field";
    } else {
        $team_name = "Whatever";
        $team_city = "Whatever";
        $team_field = "Whatever";
    }
    return view('teams.show')->with(["name" => $team_name,
                                           "city" => $team_city,
                                           "field" => $team_field
                                          ]);
})->where('id', '[0-9]+');
// 修改表單
Route::get('teams/{id}/edit', function ($id) {
    $data = [];
    if ($id ==5)
    {
        $data['team_name'] = "LHU";         //$team_name = "LHU";
        $data['team_city'] = "Taoyuang";    //$team_city = "Taoyuang";
        $data['team_field'] = "Sky Field";  //$team_field = "Sky Field";
    } else {
        $data['team_name'] = "Whatever";
        $data['team_city'] = "Whatever";
        $data['team_field'] = "Whatever";
    }
    return view('teams.edit', $data);
})->where('id', '[0-9]+');



/*------------------------------------------
 * 建立 NBA 「球員(players)」資源的所有 routing 及 view
 * function       routing (GET方法)       view 的名稱
 * 查詢            players                  players.index
 * 新增表單        players/create             players.create
 * 顯示單筆球隊資料 players/{id}              players.show
 * 修改表單        players/{id}/edit          players.edit
 ----------------------------------------*/
// 查詢
Route::get('players', function () {
    return view('players.index');
});
// 新增表單
Route::get('players/create', function () {
    return view('players.create');
});
// 顯示單筆球隊資料
Route::get('players/{id}', function ($id) {
    return view('players.show');
})->where('id', '[0-9]+');
// 修改表單
Route::get('players/{id}/edit', function ($id) {
    return view('players.edit');
})->where('id', '[0-9]+');