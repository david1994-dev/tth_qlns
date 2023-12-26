<?php

namespace App\Modules\Nhansu\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationRequest;
use App\Modules\Nhansu\src\Http\Requests\ChiNhanh\ChiNhanhRequest;
use App\Modules\Nhansu\src\Repositories\Interface\ChiNhanhRepositoryInterface;
use App\Providers\RouteServiceProvider;

class ChiNhanhController extends Controller
{
    private ChiNhanhRepositoryInterface $chiNhanhRepository;
    public function __construct(ChiNhanhRepositoryInterface $chiNhanhRepository)
    {
        $this->chiNhanhRepository = $chiNhanhRepository;
    }

    public function index(PaginationRequest $request)
    {
        $paginate['offset']     = $request->offset();
        $paginate['limit']      = $request->limit();
        $paginate['order']      = $request->order();
        $paginate['direction']  = $request->direction();
        $paginate['baseUrl']    = route('nhanSu.chiNhanh.index');

        $filter = [];
        $keyword = $request->get('keyword');
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->chiNhanhRepository->countByFilter($filter);
        $models = $this->chiNhanhRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'Nhansu::chi_nhanh.index',
            [
                'models' => $models,
                'count'      => $count,
                'paginate'   => $paginate,
                'keyword'    => $keyword
            ]
        );
    }

    public function create()
    {
        return view('Nhansu::tiep_nhan_nhan_su.tiep_nhan_nhan_su_thu_viec');
    }

    public function khaoSat1()
    {
        return view('Nhansu::khao_sat.ksuv_duoc_si');
    }

    public function khaoSat2()
    {
        return view('Nhansu::khao_sat.ksuv_bac_si');
    }

    public function khaoSat3()
    {
        return view('Nhansu::khao_sat.ksuv_van_phong');
    }

    

    public function store(ChiNhanhRequest $request)
    {
        $user = auth()->user();
        $input = $request->only(['ma', 'ten', 'trangThai']);
        $input['nguoi_cap_nhat_id'] = $user->id;
        $chinhanh = $this->chiNhanhRepository->create($input);

        if (empty($chinhanh)) {
            return redirect()
                ->back()
                ->withErrors('Tạo chi nhánh thất bại');
        }


        return redirect(RouteServiceProvider::HOME);
    }
}
