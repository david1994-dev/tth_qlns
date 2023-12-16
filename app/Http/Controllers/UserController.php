<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaginationRequest;
use App\Repositories\Interface\UserRepositoryInterface;
use App\Repositories\Interface\UserRoleRepositoryInterface;
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

    public function all(PaginationRequest $request): RedirectResponse
    {
        $roles = $this->userRoleRepository->create([
            'user_id' => 4,
            'role' => 'admin'
        ]);

        dd($roles);
    }
}
