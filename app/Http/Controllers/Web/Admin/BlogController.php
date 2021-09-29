<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Repositories\CategoryRepository;

class BlogController extends Controller
{
    private $categoryRepository;

    public function __construct(
        CategoryRepository $CategoryRepository
    )
    {
        $this->categoryRepository = $CategoryRepository;
    }

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
        $pageData = $this->categoryRepository->page();
        return Inertia::render('Blog/Category', [
            "pageData" => $pageData
        ]);
    }
}
