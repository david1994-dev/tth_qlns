<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Nhansu\src\Repositories\Interface\ChiNhanhRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\ChiTietNhanVienRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\NhanVienRepositoryInterface;
use App\Providers\RouteServiceProvider;
use App\Repositories\Interface\UserRepositoryInterface;
use App\Repositories\Interface\UserRoleRepositoryInterface;
use App\Services\FileService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Modules\Nhansu\src\Repositories\Interface\PhongBanRepositoryInterface;
class RegisteredUserController extends Controller
{
    private NhanVienRepositoryInterface $nhanVienRepository;
    private UserRepositoryInterface $userRepository;
    private UserRoleRepositoryInterface $userRoleRepository;
    private FileService $fileService;
    private ChiNhanhRepositoryInterface $chiNhanhRepository;
    private PhongBanRepositoryInterface $phongBanRepository;

    private ChiTietNhanVienRepositoryInterface $chiTietNhanVienRepository;

    public function __construct(
        NhanVienRepositoryInterface $nhanVienRepository,
        UserRepositoryInterface     $userRepository,
        FileService                 $fileService,
        UserRoleRepositoryInterface $userRoleRepository,
        ChiNhanhRepositoryInterface $chiNhanhRepository,
        PhongBanRepositoryInterface $phongBanRepository,
        ChiTietNhanVienRepositoryInterface $chiTietNhanVienRepository
    ) {
        $this->nhanVienRepository = $nhanVienRepository;
        $this->userRepository = $userRepository;
        $this->fileService = $fileService;
        $this->userRoleRepository = $userRoleRepository;
        $this->chiNhanhRepository = $chiNhanhRepository;
        $this->phongBanRepository = $phongBanRepository;
        $this->chiTietNhanVienRepository = $chiTietNhanVienRepository;
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $phongBan = $this->phongBanRepository->all();
        return view('auth.register', [
            'phongBan' => $phongBan
        ]);
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
            'password' => ['required', 'confirmed'],
        ]);

        $phongBanId = $request->get('phong_ban_id');
        $phongBan = $this->phongBanRepository->findById($phongBanId);

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);


            $nhanVien = $this->nhanVienRepository->create([
                'phong_ban_id' => $phongBan->id,
                'chi_nhanh_id' => $phongBan->chi_nhanh_id,
                'user_id' => $user->id,
                'email' => $user->email
            ]);

            $this->chiTietNhanVienRepository->create([
                'nhan_vien_id' => $nhanVien->id
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

        //create employee
//        $this->employeeRepository->create([]);

//        $image = $this->fileService->uploadImage('avatars', $request->file('avatar'));

//        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('nhansu.danhSachUngVien');
    }
}
