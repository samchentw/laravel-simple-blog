<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;

class BlogController extends Controller
{
    private $categoryRepository, $postRepository, $tagRepository;

    public function __construct(
        CategoryRepository $CategoryRepository,
        PostRepository $PostRepository,
        TagRepository $TagRepository
    ) {
        $this->categoryRepository = $CategoryRepository;
        $this->postRepository = $PostRepository;
        $this->tagRepository = $TagRepository;
    }

    public function post(Request $request)
    {
        $pageData = $this->postRepository->page();
        return Inertia::render('Blog/Post', [
            "pageData" => $pageData
        ]);
    }

    public function tag(Request $request)
    {
        $pageData = $this->tagRepository->page();
        return Inertia::render('Blog/Tag', [
            "pageData" => $pageData
        ]);
    }

    public function category(Request $request)
    {
        $pageData = $this->categoryRepository->page();
        return Inertia::render('Blog/Category', [
            "pageData" => $pageData
        ]);
    }
}
