<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Web\Blog;




Route::get('/', [Blog\BlogController::class, 'index']);
Route::get('/example', [Blog\BlogController::class, 'example']);
Route::get('/blog/login', [Blog\BlogController::class, 'login']);
Route::get('/blog/register', [Blog\BlogController::class, 'register']);

Route::get('/blog/index', [Blog\BlogController::class, 'blogIndex']);
