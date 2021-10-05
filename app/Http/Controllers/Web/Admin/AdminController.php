<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Samchentw\Permission\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Inertia\Inertia;

class AdminController extends Controller
{
    private $userRepository, $roleRepository;

    public function __construct(
        UserRepository $UserRepository,
        RoleRepository $RoleRepository
    ) {
        $this->userRepository = $UserRepository;
        $this->roleRepository = $RoleRepository;
    }


    public function roleSetting()
    {
        $pageData = $this->roleRepository->page();
        return Inertia::render('PermissionManagement/RoleSetting', [
            "pageData" => $pageData
        ]);
    }

    public function userSetting()
    {
        $pageData = $this->userRepository->page();
        return Inertia::render('PermissionManagement/UserSetting', [
            "pageData" => $pageData
        ]);
    }
}
