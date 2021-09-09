<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Samchentw\Permission\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use PasswordValidationRules;
    private $userRepository, $roleRepository;

    public function __construct(
        UserRepository $UserRepository,
        RoleRepository $RoleRepository
    ) {
        $this->userRepository = $UserRepository;
        $this->roleRepository = $RoleRepository;
    }

    /**
     * @group UserController(使用者)
     * user1.取得使用者
     *
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        return $this->userRepository->getById($id);
    }



    /**
     * @group UserController(使用者)
     * user2.建立使用者
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * @bodyParam  name string required 
     * @bodyParam  email string required 
     * @bodyParam  password string required 
     * @bodyParam  role_ids int[] required 
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role_ids' => ['array','nullable']
        ]);

        DB::transaction(function () use ($request) {
            return tap($this->userRepository->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]), function ($user) use ($request) {
                $roles = $this->roleRepository->getRolesByIds($request->input('role_ids', []));
                $user->roles()->attach($roles);
            });
        });
    }



    /**
     * @group UserController(使用者)
     * user3.修改使用者
     * @todo 可以修改密碼或另開api
     * 
     * @bodyParam  name string required 
     * @bodyParam  role_ids int[] required 
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => $this->passwordRules(),
            'role_ids' => ['array','nullable']
        ]);
        $user = $this->userRepository->getById($id);
        $user->roles()->sync($request->input('role_ids', []));
        $this->userRepository->update([
            'name' => $request->name,
            // 'email' => $request->email
        ], $id);
    }

}
