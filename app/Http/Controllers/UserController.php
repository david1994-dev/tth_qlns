<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaginationRequest;
use App\Repositories\Interface\UserRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function all(PaginationRequest $request): RedirectResponse
    {

    }
}
