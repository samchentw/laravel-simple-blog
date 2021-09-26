<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Web\Blog;


Route::name('blog.')->group(function () {
    Route::get('/', [Blog\BlogController::class, 'index']);
    Route::get('/tag', [Blog\BlogController::class, 'tag']);
    Route::get('/example', [Blog\BlogController::class, 'example']);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/verify', [Blog\BlogController::class, 'verify'])->name('verify');
    });
    


    // post
    Route::prefix('post')->name('post.')->group(function () {

        Route::get('/index', [Blog\PostController::class, 'index']);

        Route::middleware(['auth:sanctum', 'verified:blog.verify'])->group(function () {
            Route::get('/edit/{id?}', [Blog\PostController::class, 'edit']);
        });
    });

    Route::prefix('member')->name('member.')->group(function () {

        Route::get('/login', [Blog\MemberController::class, 'login'])->name('login');
        Route::get('/register', [Blog\MemberController::class, 'register'])->name('register');

        Route::middleware(['auth:sanctum', 'verified:blog.verify'])->group(function () {
            Route::get('/index', [Blog\MemberController::class, 'index'])->name('index');
            Route::get('/change-password', [Blog\MemberController::class, 'changePassword'])->name('changePassword');
            Route::get('/post-list', [Blog\MemberController::class, 'postList'])->name('postList');
        });
    });
});
