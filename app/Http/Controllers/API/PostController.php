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
     * @group PostController(文章)
     * post1.建立文章
     * 
     * @bodyParam  title string required 標題
     * @bodyParam  body string required 內容
     * @bodyParam  categoryId int required 類別Id
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


    /**
     * @group PostController(文章)
     * post1.修改文章
     * 
     * @bodyParam  title string required 標題
     * @bodyParam  body string required 內容
     * @bodyParam  categoryId int required 類別Id
     */
    public function update(Request $request, $id)
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
        $post = $this->postRepository->getById($id);
        $post->category()->associate($request->categoryId);
        $post->update($request->only($fillable));
    }
}
