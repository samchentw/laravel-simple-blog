<?php

namespace App\Http\Responses;


use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;
use Illuminate\Support\Str;
use App\Helpers\RedirectHelper;

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
        $redirectUrl = RedirectHelper::getLoginUrl($previousUrl);
        return redirect()->intended($redirectUrl);
    }
}
