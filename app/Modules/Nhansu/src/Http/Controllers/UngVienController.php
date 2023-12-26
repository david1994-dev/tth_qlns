<?php

namespace App\Modules\Nhansu\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\ModuleRouterServiceProvider;
use App\Modules\Nhansu\src\Http\Requests\NhanVien\UngVienRequest;
use App\Modules\Nhansu\src\Repositories\Interface\UngVienRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UngVienController extends Controller
{
    private UngVienRepositoryInterface $ungVienRepository;
    public function __construct(UngVienRepositoryInterface $ungVienRepository)
    {
        $this->ungVienRepository = $ungVienRepository;
    }

    public function index($type)
    {
        switch ($type) {
            case 'bac-si':
                $a = $this->ungVienRepository->findById(7);
//                dd($a->qua_trinh_lam_viec);
                return view('Nhansu::khao_sat.ksuv_bac_si');
            case 'duoc-si':
                return view('Nhansu::khao_sat.ksuv_duoc_si');
            case 'van-phong':
                return view('Nhansu::khao_sat.ksuv_van_phong');
            default:
                return '';
        }
    }

    public function store(UngVienRequest $request)
    {
        $mainField = [
            'vi_tri_ung_tuyen', 'ho_ten', 'dien_thoai','email', 'dia_chi',
            'vi_tri_ung_tuyen', 'don_vi_ung_tuyen',
            'ngay_sinh', 'thang_sinh', 'nam_sinh', 'loai_ung_vien', 'thoi_gian_lam_viec',
            'don_vi_cong_tac', 'vi_tri_lam_viec'
        ];

        $input = $request->only($mainField);
        $input['ngay_sinh'] = Carbon::createFromDate($input['nam_sinh'], $input['thang_sinh'], $input['ngay_sinh']);
        $input['ngay_ky'] = now()->clone();

        $workingProcess = [];
        $workTimes = $request->get('thoi_gian_lam_viec', []);
        $workPositions = $request->get('vi_tri_lam_viec', []);
        $workCompanies = $request->get('don_vi_cong_tac', []);
        foreach ($workTimes as $key => $workTime) {
            if (!$workTime) {
                break;
            }

            $workCompany = Arr::get($workCompanies, $key, null);
            if (!$workCompany) {
                break;
            }

            $workingProcess[$workTime][$workCompany] = Arr::get($workPositions, $key, null);
        }

        $input['qua_trinh_lam_viec'] = $workingProcess;
        $input['chi_tiet'] = $request->except($mainField);
        $ungVien = $this->ungVienRepository->create($input);

        if (empty($ungVien)) {
            return redirect()
                ->back()
                ->withErrors('Tạo ứng viên thất bại');
        }

        session()->flash('success', 'Bạn đã gửi khảo sát thành công');

        return redirect()
            ->back();
    }
}
