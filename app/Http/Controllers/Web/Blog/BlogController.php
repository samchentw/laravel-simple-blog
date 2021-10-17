<?php

namespace App\Http\Controllers\Web\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\TagRepository;

class BlogController extends Controller
{
    private $tagRepository;

    public function __construct(
        TagRepository $TagRepository
    ) {
        $this->tagRepository = $TagRepository;
    }

    public function index(Request $request)
    {
        return view('blog.pages.index');
    }

  

    public function tag(Request $request)
    {
        $tags = $this->tagRepository->getAll();
        return view('blog.pages.tag',[
            'tags' => $tags
        ]);
    }



    public function example(){
        return view('blog.pages.example');
    }

    public function verify(){
        return view('blog.pages.verify');
    }
}
