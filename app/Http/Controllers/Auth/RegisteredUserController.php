<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\ModuleRouterServiceProvider;
use App\Modules\Nhansu\src\Repositories\Interface\NhanVienRepositoryInterface;
use App\Providers\RouteServiceProvider;
use App\Repositories\Interface\UserRepositoryInterface;
use App\Repositories\Interface\UserRoleRepositoryInterface;
use App\Services\FileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    private NhanVienRepositoryInterface $employeeRepository;
    private UserRepositoryInterface $userRepository;
    private UserRoleRepositoryInterface $userRoleRepository;
    private FileService $fileService;

    public function __construct(
        NhanVienRepositoryInterface $employeeRepository,
        UserRepositoryInterface     $userRepository,
        FileService                 $fileService,
        UserRoleRepositoryInterface $userRoleRepository
    ) {
        $this->employeeRepository = $employeeRepository;
        $this->userRepository = $userRepository;
        $this->fileService = $fileService;
        $this->userRoleRepository = $userRoleRepository;
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //create employee
//        $this->employeeRepository->create([]);

//        $image = $this->fileService->uploadImage('avatars', $request->file('avatar'));

//        event(new Registered($user));

        Auth::login($user);

        return redirect(ModuleRouterServiceProvider::NHANSU_INDEX);
    }
}
