<?php

return [
    /**
     * 是否啟用權限功能
     */
    "enable" => true,

    /**
     * 是否啟用Role api
     */
    "role_api_enable" => true,

    /**
     * 權限群組
     */
    "groups" => [
        "pages" => [
            [
                'label' => '角色管理',
                'key' => 'Page.Role',
                'permissions' => ['Create', 'Update', 'Delete']
            ],
            [
                'label' => '使用者管理',
                'key' => 'Page.User',
                'permissions' => ['Create', 'Update', 'Delete']
            ],
            [
                'label' => '類別管理',
                'key' => 'Page.Category',
                'permissions' => ['Create', 'Update', 'Delete']
            ],
            [
                'label' => '標籤管理',
                'key' => 'Page.Tag',
                'permissions' => ['Create', 'Update', 'Delete']
            ],
            [
                'label' => '文章管理',
                'key' => 'Page.Post',
                'permissions' => ['Create', 'Update', 'Delete']
            ]
        ],

        "features" => [
            [
                'group' =>'設定權限',
                'label' => 'Mail設定',
                'key' => 'Settings.Mail'
            ],
            [
                'group' =>'設定權限',
                'label' => 'TinyMCE api key設定',
                'key' => 'Settings.Tinymce.ApiKey'
            ],
            [
                'group' =>'身分權限',
                'label' => '系統-管理員',
                'key' => 'Identity.Admin'
            ],
            [
                'group' =>'身分權限',
                'label' => '系統-會員',
                'key' => 'Identity.Member'
            ]
        ]
    ]

];
