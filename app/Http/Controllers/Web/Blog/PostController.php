<?php

namespace App\Http\Controllers\Web\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
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

    public function show($id, $slug, Request $request)
    {
        $post = $this->postRepository->getPostByIdWithSlug($id, $slug);
        if ($post == null) abort(404);
        if (Auth::check()) {
            $user = $request->user();
            foreach ($user->notifications as $notification) {
                if ($notification->data['type'] == 'post' && $notification->data['target_id'] == $id) {
                    $notification->markAsRead();
                }
            }
        }

        return view('blog.pages.post.show', ['post' => $post]);
    }


    public function index(Request $request)
    {
        $tags = $this->tagRepository->getHasPost();
        $postPage = $this->postRepository->getPostPage();
        return view(
            'blog.pages.post.index',
            [
                'tags' => $tags,
                'postPage' => $postPage
            ]
        );
    }

    public function edit(Request $request, $id = 0)
    {
        $categories = $this->categoryRepository->getAllForFront();
        $tags = $this->tagRepository->getAll();
        if ($id != 0) {
            $post =  $this->postRepository->getModel()->with(['tags'])->where('id', $id)->first();
            if ($request->user()->id != $post->user_id) {
                abort(404);
            } else {
                return view('blog.pages.post.edit', [
                    'categories' => $categories,
                    'post' => new PostResource($post),
                    'tags' => $tags
                ]);
            }
        }

        return view('blog.pages.post.edit', compact('categories', 'tags'));
    }
}
