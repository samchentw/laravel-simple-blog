<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(
        PostRepository $PostRepository
    ) {
        $this->postRepository = $PostRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['string', 'required'],
            'body' => ['string', 'required'],
            'categoryId' => [
                'numeric', 'required',
                Rule::exists('categories', 'id')
            ]
        ]);

        $fillable = $this->postRepository->getFillable();
        $post = $this->postRepository->getModel()->fill($request->only($fillable));
        $post->user()->associate($request->user());
        $post->category()->associate($request->categoryId);
        $post->save();
    }
}
