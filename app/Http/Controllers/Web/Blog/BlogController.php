<?php

namespace App\Http\Controllers\Web\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        return view('blog.pages.index');
    }

    public function login(Request $request)
    {
        return view('blog.pages.member.login');
    }

    public function register(Request $request)
    {
        return view('blog.pages.member.register');
    }

    public function blogIndex(Request $request)
    {
        return view('blog.pages.member.index');
    }

    public function tag(Request $request)
    {
        return view('blog.pages.tag');
    }

    public function post(Request $request)
    {
        return view('blog.pages.post.index');
    }

    public function example(){
        return view('blog.pages.example');
    }
}
