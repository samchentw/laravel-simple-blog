<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Samchentw\Settings\Contracts\SettingManager;

class ExampleController extends Controller
{
    public function __construct()
    {
    }

    public function user(Request $request)
    {
        return $request->user();
    }


    public function json()
    {
        return [
            "enable" => true,
            "text" => "how are you"
        ];
    }
}
