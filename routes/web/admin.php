<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Web\Admin;


//後台頁面 
//路由： /admin
Route::middleware(['auth:sanctum', 'verified', 'can:Identity.Admin'])->name('admin.')->prefix("admin")->group(function () {

  //路由： /permission-management
  Route::name('permission-management.')->prefix('permission-management')->group(function () {
    Route::get('/role-setting', [Admin\AdminController::class, "roleSetting"])->name('roleSetting');
    Route::get('/user-setting', [Admin\AdminController::class, "userSetting"])->name('userSetting');
  });

  //路由： /blog
  Route::name('blog.')->prefix('blog')->group(function () {
    Route::get('/post', [Admin\BlogController::class, "post"])->middleware(['can:Page.Post'])->name('post');
    Route::get('/tag', [Admin\BlogController::class, "tag"])->middleware(['can:Page.Tag'])->name('tag');
    Route::get('/category', [Admin\BlogController::class, "category"])->middleware(['can:Page.Category'])->name('category');
  });

  //路由： /example
  // Route::name('example.')->prefix('example')->group(function () {
  //     Route::get('/test', [Admin\ExampleController::class, "test"])->name('test');
  //     Route::get('/todo', [Admin\ExampleController::class, "todo"])->name('todo');
  // });

  Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
  })->name('dashboard');

  Route::get('/', function () {
    return redirect('/admin/dashboard');
  });
});
