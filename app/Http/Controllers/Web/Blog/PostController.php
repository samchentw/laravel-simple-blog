<?php

namespace App\Http\Controllers\Web\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;

class PostController extends Controller
{

    private $categoryRepository;

    public function __construct(
        CategoryRepository $CategoryRepository
    )
    {
        $this->categoryRepository = $CategoryRepository;
    }


    public function index(Request $request)
    {
        return view('blog.pages.post.index');
    }

    public function edit(Request $request, $id = 0)
    {
        $categories = $this->categoryRepository->getAllForFront();
        return view('blog.pages.post.edit',compact('categories'));
    }
}
