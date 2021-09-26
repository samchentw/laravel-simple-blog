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
        $urlStrOf = Str::of($previousUrl)->replace($fullUrl, '');
        $check = $urlStrOf->startsWith('/admin') || $urlStrOf->startsWith('/user');
        $redirectUrl = $check  ? '/login' : '/member/login';
        return redirect()->intended($redirectUrl);
    }
}
