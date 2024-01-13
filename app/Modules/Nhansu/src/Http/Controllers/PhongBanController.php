<?php

namespace App\Modules\Nhansu\src\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationRequest;
use App\Modules\Nhansu\src\Repositories\Interface\ChiNhanhRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\PhongBanRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Modules\Nhansu\src\Models\ChiNhanh;
class PhongBanController extends Controller
{
    private PhongBanRepositoryInterface $phongBanRepository;
    private ChiNhanhRepositoryInterface $chiNhanhRepository;

    public function __construct(
        PhongBanRepositoryInterface $phongBanRepository,
        ChiNhanhRepositoryInterface $chiNhanhRepository
    ) {
        $this->phongBanRepository = $phongBanRepository;
        $this->chiNhanhRepository = $chiNhanhRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(PaginationRequest $request)
    {
        $paginate['limit']      = $request->limit();
        $paginate['offset']     = $request->offset();
        $paginate['order']      = $request->order();
        $paginate['direction']  = $request->direction();
        $paginate['baseUrl']    = route('nhansu.khoa-phong-ban.index');
        $keyword = $request->get('keyword');

        $filter = [];
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->phongBanRepository->countByFilter($filter);
        $models = $this->phongBanRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'Nhansu::phong_ban.index',
            [
                'models'    => $models,
                'count'         => $count,
                'paginate'      => $paginate,
                'keyword'       => $keyword
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_chinhanh = $this->chiNhanhRepository->all();
        return view('Nhansu::phong_ban.create',[
            'list_chinhanh' => $this->chiNhanhRepository->pluck($list_chinhanh, 'ten', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $input = $request->only(['ma', 'ten','chi_nhanh_id','dinh_bien']);
        $input['dinh_bien'] =  $input['dinh_bien'] ?? 0;
        $input['nguoi_cap_nhat_id'] = $user->id;

        $phongBan = $this->phongBanRepository->create($input);

        if (!$phongBan) {
            return redirect()
                ->back()
                ->withErrors('Tạo khoa - phòng - ban thất bại');
        }

        session()->flash('success', 'Bạn đã tạo khoa - phòng - ban thành công');

        return redirect()
            ->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
