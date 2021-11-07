<?php

namespace App\Http\Controllers\Web\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\TagRepository;
use App\Repositories\PostRepository;

class BlogController extends Controller
{
    private $tagRepository, $postRepository;

    public function __construct(
        PostRepository $PostRepository,
        TagRepository $TagRepository
    ) {
        $this->tagRepository = $TagRepository;
        $this->postRepository = $PostRepository;
    }

    public function index(Request $request)
    {
        return view('blog.pages.index');
    }



    public function tag(Request $request)
    {
        $tags = $this->tagRepository->getAll();
        return view('blog.pages.tag', [
            'tags' => $tags
        ]);
    }

    public function tagPost(Request $request, int $id)
    {
        $tags = $this->tagRepository->getHasPost();
        $postPage = $this->postRepository->getPostPageByTagId($id);
        return view(
            'blog.pages.post.index',
            [
                'tags' => $tags,
                'postPage' => $postPage
            ]
        );
    }




    public function example()
    {
        return view('blog.pages.example');
    }

    public function verify()
    {
        return view('blog.pages.verify');
    }
}
