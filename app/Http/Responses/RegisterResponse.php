<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use Gate;
use App\Providers\RouteServiceProvider;

class RegisterResponse implements RegisterResponseContract
{
    /**
     * @author Sam
     * @param  $request
     * @return mixed
     * @todo
     */
    public function toResponse($request)
    {
        $home = RouteServiceProvider::HOME;

        return redirect()->intended($home);
    }
}
