<?php

return [

    "connection" => env('SETTING_CONNECTION', ''),
    
    /**
     * 註冊有效provider_name值
     * G(全域)、U(使用者) 為預設
     */
    "customer_provider_name" => [
        'A','B'
    ],


    /**
     * 預設的provider_name
     */
    "default_provider_name" => 'G',

    /**
     * 是否啟用setting預設api
     */
    "setting_api_enable" => true,

    "setting_web_enable" => true
];
