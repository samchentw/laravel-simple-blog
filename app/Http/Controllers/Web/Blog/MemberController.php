<?php

namespace App\Http\Controllers\Web\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;
use App\Models\Post;
class MemberController extends Controller
{
    private $postRepository;

    public function __construct(
        PostRepository $PostRepository
    )
    {
        $this->postRepository = $PostRepository;        
    }

    public function login(Request $request)
    {
        return view('blog.pages.member.login');
    }

    public function register(Request $request)
    {
        return view('blog.pages.member.register');
    }

    public function index(Request $request)
    {
        return view('blog.pages.member.index');
    }

    public function changePassword(Request $request)
    {
        return view('blog.pages.member.change_password');
    }

    public function postList(Request $request)
    {
        $postQuery = $this->postRepository->getQuery();
        $posts = $postQuery->where('user_id',$request->user()->id)->orderBy('created_at','desc')->get();
        foreach($posts as $post){
            $post->excerpt = $post->excerpt;
        }
        return view('blog.pages.member.post_list',compact('posts'));
    }

    public function reply(Request $request)
    {
        return view('blog.pages.member.reply');
    }

}
