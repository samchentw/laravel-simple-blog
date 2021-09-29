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
            'category_id' => [
                'numeric', 'required',
                Rule::exists('categories', 'id')
            ]
        ]);

        $fillable = $this->postRepository->getFillable();
        $post = $this->postRepository->getModel()->fill($request->only($fillable));
        $post->user()->associate($request->user());
        $post->category()->associate($request->category_id);
        $post->save();
    }


    /**
     * @group PostController(文章)
     * post2.修改文章
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
            'category_id' => [
                'numeric', 'required',
                Rule::exists('categories', 'id')
            ]
        ]);

        $fillable = $this->postRepository->getFillable();
        $post = $this->postRepository->getById($id);
        $this->authorize('update', $post);

        $post->category()->associate($request->category_id);
        $post->update($request->only($fillable));
    }


    /**
     * @group PostController(文章)
     * post3.刪除文章
     * 
     */
    public function delete(Request $request, $id)
    {
        $post = $this->postRepository->getById($id);
        $this->authorize('delete', $post);
        $this->postRepository->destroy($id);
    }
}
