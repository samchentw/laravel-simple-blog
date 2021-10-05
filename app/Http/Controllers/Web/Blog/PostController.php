<?php

namespace App\Http\Controllers\Web\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;

class PostController extends Controller
{

    private $categoryRepository, $postRepository;

    public function __construct(
        CategoryRepository $CategoryRepository,
        PostRepository $PostRepository
    ) {
        $this->categoryRepository = $CategoryRepository;
        $this->postRepository = $PostRepository;
    }

    // todo
    public function show($id, $slug)
    {
    }


    public function index(Request $request)
    {
        return view('blog.pages.post.index');
    }

    public function edit(Request $request, $id = 0)
    {
        $categories = $this->categoryRepository->getAllForFront();

        if ($id != 0) {
            $post =  $this->postRepository->getById($id);
            if ($request->user()->id != $post->user_id) {
                abort(404);
            } else {
                return view('blog.pages.post.edit', compact('categories', 'post'));
            }
        }

        return view('blog.pages.post.edit', compact('categories'));
    }
}
