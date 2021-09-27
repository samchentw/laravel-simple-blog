<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function post(Request $request)
    {
        return Inertia::render('Blog/Post', []);
    }

    public function tag(Request $request)
    {
        return Inertia::render('Blog/Tag', []);
    }

    public function category(Request $request)
    {
        return Inertia::render('Blog/Category', []);
    }
}
