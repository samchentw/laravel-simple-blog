<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Str;

class LoginResponse implements LoginResponseContract
{
    /**
     * @author Sam
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        $previousUrl = url()->previous();
        $fullUrl = url('/');
        $check = Str::of($previousUrl)->replace($fullUrl, '')->startsWith('/login');
        $home = $check  ? RouteServiceProvider::HOME : '/';
        // $home = auth()->user()->isAdmin() ? RouteServiceProvider::HOME : '/';
        return redirect()->intended($home);
    }
}
