<?php

namespace App\Modules\Nhansu\src\Http\Controllers;

use App\Modules\Nhansu\src\Http\Requests\PaginationRequest;
use App\Modules\Nhansu\src\Repositories\Interface\UserRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\UserRoleRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;
    private UserRoleRepositoryInterface $userRoleRepository;


    public function __construct(
        UserRepositoryInterface $userRepository,
        UserRoleRepositoryInterface $userRoleRepository
    ) {
        $this->userRepository = $userRepository;
        $this->userRoleRepository = $userRoleRepository;
    }

    public function all(PaginationRequest $request)
    {
        return view('Nhansu::index');
    }
}
