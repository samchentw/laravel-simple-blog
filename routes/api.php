<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API;
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

/**
 * 建立api文檔指令： php artisan scribe:generate
 */

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/example/user', [ExampleController::class, 'user']);

    //使用者 Api
    Route::prefix('user')->name('user.')->group(function () {
        // 取得使用者
        Route::get('{id}', [API\UserController::class, 'get'])->middleware(['can:Page.User']);
        // 新增使用者
        Route::post('', [API\UserController::class, 'store'])->middleware(['can:Page.User.Create']);
        // 修改使用者
        Route::put('{id}', [API\UserController::class, 'update'])->middleware(['can:Page.User.Update']);
    });
});