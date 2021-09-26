<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Models\Category;
use App\Models\Post;

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
            'categoryId' => ['numeric']
        ]);
        
        $fillable = $this->postRepository->getFillable();
      
        $post = $this->postRepository->getModel()->fill($request->only($fillable));
      
        $user = $request->user();
        $post->user()->associate($user);
        $post->category()->associate($request->categoryId);

        $post->save();
    }
}
