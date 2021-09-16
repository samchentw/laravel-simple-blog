<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Web\Blog;




Route::get('/', [Blog\BlogController::class, 'index']);
Route::get('/tag', [Blog\BlogController::class, 'tag']);
Route::get('/example', [Blog\BlogController::class, 'example']);


// post
Route::prefix('post')->name('post.')->group(function(){

    Route::get('/index', [Blog\PostController::class, 'index']);
    
    Route::middleware(['auth:sanctum', 'verified'])->group(function(){
        Route::get('/edit/{id?}', [Blog\PostController::class, 'edit']);
    });
});

Route::prefix('member')->name('member.')->group(function(){

    Route::get('/login', [Blog\MemberController::class, 'login']);
    Route::get('/register', [Blog\MemberController::class, 'register']);

    Route::middleware(['auth:sanctum', 'verified'])->group(function(){
        Route::get('/index', [Blog\MemberController::class, 'index']);
    });
});


