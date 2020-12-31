<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\TeamsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);

Route::post('login',  [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    // 查詢所有球隊
    Route::get('teams', [TeamsController::class, 'api_teams']);
    // 修改指定球隊
    Route::patch('teams', [TeamsController::class, 'api_update']);
    // 刪除指定球隊
    Route::delete('teams', [TeamsController::class, 'api_delete']);
    // 查詢所有球員
    Route::get('players', [PlayersController::class, 'api_players']);
    // 修改指定球員
    Route::patch('players', [PlayersController::class, 'api_update']);
    // 刪除指定球員
    Route::delete('players', [PlayersController::class, 'api_delete']);

});
