<?php

namespace App\Http\Responses;


use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;
use Illuminate\Support\Str;

class LogoutResponse implements LogoutResponseContract
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
        $check = Str::of($previousUrl)->replace($fullUrl, '')->startsWith('/admin');
        $redirectUrl = $check  ? '/login' : '/blog/login';
        return redirect()->intended($redirectUrl);
    }
}
