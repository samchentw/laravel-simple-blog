<?php

namespace App\Http\Controllers\Web\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct()
    {
        
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
        return view('blog.pages.member.post_list');
    }
}
