<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;


class PostHelper
{
    public static function makeSlug(string $input)
    {
         $title = preg_replace('/[^A-Za-z0-9 \p{Han}]+/u', '', $input);
         $title = str_replace(' ', '-', $title);
         $title = strtolower($title);
         return $title;
    }


    public static function makeExcerpt(string $body, int $length = 150)
    {
        return Str::limit(strip_tags($body), $length);
    }
}
