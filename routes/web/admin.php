<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Web\Admin;


//後台頁面 
//路由： /admin
Route::middleware(['auth:sanctum', 'verified'])->name('admin.')->prefix("admin")->group(function () {

    //路由： /example
    // Route::name('example.')->prefix('example')->group(function () {
    //     Route::get('/test', [Admin\ExampleController::class, "test"])->name('test');
    //     Route::get('/todo', [Admin\ExampleController::class, "todo"])->name('todo');
    // });
});
