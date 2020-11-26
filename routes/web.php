<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\PlayersController;
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
Route::get('teams', [TeamsController::class, 'index'])->name('teams.index');
// 新增表單
Route::get('teams/create', [TeamsController::class, 'create'])->name('teams.create');
// 顯示單筆球隊資料

Route::get('teams/{id}', [TeamsController::class, 'show'])->where('id', '[0-9]+')->name('teams.show');
// 修改表單
Route::get('teams/{id}/edit', [TeamsController::class, 'edit'])->where('id', '[0-9]+')->name('teams.edit');



/*------------------------------------------
 * 建立 NBA 「球員(players)」資源的所有 routing 及 view
 * function       routing (GET方法)       view 的名稱
 * 查詢            players                  players.index
 * 新增表單        players/create             players.create
 * 顯示單筆球隊資料 players/{id}              players.show
 * 修改表單        players/{id}/edit          players.edit
 ----------------------------------------*/
// 查詢
Route::get('players', [PlayersController::class, 'index'])->name('players.index');
// 新增表單
Route::get('players/create', [PlayersController::class, 'create'])->name('players.create');
// 顯示單筆球隊資料
Route::get('players/{id}', [PlayersController::class, 'show'])->where('id', '[0-9]+')->name('players.show');
// 修改表單
Route::get('players/{id}/edit', [PlayersController::class, 'edit'])->where('id', '[0-9]+')->name('players.edit');
