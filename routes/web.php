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
})->where('id', '[0-9]+');
// 修改表單
Route::get('teams/{id}/edit', function ($id) {
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
    return view('players.show')->with('player_id', $id);
})->where('id', '[0-9]+');
// 修改表單
Route::get('players/{id}/edit', function ($id) {
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
})->where('id', '[0-9]+');
