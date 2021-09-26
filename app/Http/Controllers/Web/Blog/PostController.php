<?php

namespace App\Http\Controllers\Web\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;

class PostController extends Controller
{

    public function __construct()
    {
    }


    public function index(Request $request)
    {
        return view('blog.pages.post.index');
    }

    public function edit(Request $request, $id = 0)
    {
        return view('blog.pages.post.edit');
    }
}
