<?php

namespace App\Modules\SuCoYKhoa\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\SuCoYKhoa\src\Http\Request\BaoCaoSuCoRequest;
use App\Modules\SuCoYKhoa\src\Repositories\Interface\BaoCaoSuCoYKhoaRepositoryInterface;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BaoCaoSuCoYKhoaController extends Controller
{
    private BaoCaoSuCoYKhoaRepositoryInterface $baoCaoSuCoYKhoaRepository;

    public function __construct(BaoCaoSuCoYKhoaRepositoryInterface $baoCaoSuCoYKhoaRepository)
    {
        $this->baoCaoSuCoYKhoaRepository = $baoCaoSuCoYKhoaRepository;
    }

    public function viewBaoCao()
    {
        return view('SuCoYKhoa::bao_cao.bao_cao_su_co');
    }

    public function create(BaoCaoSuCoRequest $request)
    {
        $mainField = [
            'ho_ten_nguoi_benh', 'ngay_bao_cao', 'ngay_su_co', 'khoa_phong_su_co', 'mo_ta', 'de_xuat_giai_phap',
            'giai_phap_da_thuc_hien', 'ho_ten_nguoi_bao_cao', '_token'
        ];

        $input = $request->only($mainField);
        $input['chi_tiet'] = $request->except($mainField);

        $baoCao = $this->baoCaoSuCoYKhoaRepository->create($input);
        if (empty($baoCao)) {
            return redirect()
                ->back()
                ->withErrors('Tạo báo cáo thất bại');
        }

        $baoCao->ma = $this->baoCaoSuCoYKhoaRepository->renderMaBc($baoCao);
        $baoCao->save();

        session()->flash('success', 'Bạn đã gửi báo cáo thành công! Mã báo cáo là: <b>'.$baoCao->ma.'</b>');

        return redirect()
            ->back();
    }
}
