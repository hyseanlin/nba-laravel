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
    Route::get('teams', [TeamsController::class, 'teams']);
    // 刪除指定球隊
    Route::delete('teams', [TeamsController::class, 'delete']);
    // 查詢所有球員
    Route::get('players', [PlayersController::class, 'players']);
    // 刪除指定球員
    Route::delete('players', [PlayersController::class, 'delete']);

});
