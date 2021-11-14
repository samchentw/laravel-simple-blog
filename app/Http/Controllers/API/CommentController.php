<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CommentRepository;
use Illuminate\Validation\Rule;
use App\Repositories\PostRepository;
use App\Notifications\MessageForUser;
use App\Helpers\PostHelper;

class CommentController extends Controller
{
    private $commentRepository;
    public function __construct(
        CommentRepository $CommentRepository
    ) {
        $this->commentRepository = $CommentRepository;
    }

    public function create(Request $request, PostRepository $postRepository)
    {
        $request->validate([
            'body' => ['string', 'required'],
            'post_id' => [
                'numeric', 'required',
                Rule::exists('posts', 'id')
            ],
        ]);

        // $this->commentRepository->getModel()
        $input = [
            'user_id' => $request->user()->id,
            'post_id' => $request->post_id,
            'body' => $request->body
        ];

        $post = $postRepository->getModel()->with(['user'])->whereId($request->post_id)->first();
        if ($post->user->id != $input['user_id']) {
            $customerName = $request->user()->name;
            $title = "您的文章有新的留言！";

            $postUrl = PostHelper::makePostUrl($post);
            $html = "<a href='{$postUrl}'>點擊查看</a>";
            $message = "{$customerName}在[{$post->title}]文章中留言。{$html}";
            $post->user->notify(new MessageForUser($title, $message, "post", $post->id));
        }
        $this->commentRepository->create($input);
    }
}
