<?php

use App\Http\Controllers\Api\UsersController;
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

// ログイン認証
Route::post('/users/login', [UsersController::class, 'login']);
// 認証必須ルーティング
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/users', [UsersController::class, 'index']);
});
