<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Str;

class RegisterResponse implements RegisterResponseContract
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
        $check = Str::of($previousUrl)->replace($fullUrl, '')->startsWith('/register');
        $home = $check  ? RouteServiceProvider::HOME : '/';
        return redirect()->intended($home);
    }
}
