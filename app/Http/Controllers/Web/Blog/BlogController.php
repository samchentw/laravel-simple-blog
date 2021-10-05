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

  

    public function tag(Request $request)
    {
        return view('blog.pages.tag');
    }



    public function example(){
        return view('blog.pages.example');
    }

    public function verify(){
        return view('blog.pages.verify');
    }
}
