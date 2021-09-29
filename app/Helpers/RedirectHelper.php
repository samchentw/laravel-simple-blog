<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;


class RedirectHelper
{

    /**
     * 確認是否為後台Url
     */
    public static function isAdminUrl(string $url)
    {
        $fullUrl = url('/');
        $urlStrOf = Str::of($url)->replace($fullUrl, '');
        return $urlStrOf->startsWith('/admin') || $urlStrOf->startsWith('/user');
    }

    /**
     * 依照目前Url判斷該導回的登入頁網址
     */
    public static function getLoginUrl(string $currentUrl)
    {
        return static::isAdminUrl($currentUrl) ? '/login' : '/member/login';
    }
}
