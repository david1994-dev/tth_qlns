<?php

namespace App\Modules\Nhansu\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationRequest;
use App\Modules\Nhansu\src\Repositories\Interface\NhanVienRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\NhomNhanSuRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NhomNhanSuController extends Controller
{
    private NhomNhanSuRepositoryInterface $nhomNhanSuRepository;
    private NhanVienRepositoryInterface $nhanVienRepository;

    public function __construct(
        NhomNhanSuRepositoryInterface $nhomNhanSuRepository,
        NhanVienRepositoryInterface $nhanVienRepository
    ) {
        $this->nhomNhanSuRepository = $nhomNhanSuRepository;
        $this->nhanVienRepository = $nhanVienRepository;
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
        $paginate['baseUrl']    = route('nhansu.nhom-nhan-su.index');
        $keyword = $request->get('keyword');

        $filter = [];
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->nhomNhanSuRepository->countByFilter($filter);
        $models = $this->nhomNhanSuRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'Nhansu::nhom_nhan_su.index',
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
        return view('Nhansu::nhom_nhan_su.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $input = $request->only(['ten', 'user_ids']);
        $input['slug'] = Str::slug($input['ten']);
        $input['nguoi_cap_nhat_id'] = $user->id;

        $chiNhanh = $this->nhomNhanSuRepository->create($input);

        if (!$chiNhanh) {
            return redirect()
                ->back()
                ->withErrors('Tạo nhóm nhân viên thất bại');
        }

        session()->flash('success', 'Bạn đã tạo nhóm nhân viên thành công');

        return redirect()->route('nhansu.nhom-nhan-su.index');
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
        $model = $this->nhomNhanSuRepository->findById($id);
        if (empty($model)) abort(404);

        return view('Nhansu::nhom-nhan-su.edit', [
            'model' => $model
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = auth()->user();
        $model = $this->nhomNhanSuRepository->findById($id);
        if (empty($model)) abort(404);
        $input = $request->only(['ten', 'user_ids']);
        $input['slug'] = Str::slug($input['ten']);
        $input['nguoi_cap_nhat_id'] = $user->id;

        $this->nhomNhanSuRepository->update($model, $input);

        session()->flash('success', 'Bạn đã cập nhật nhóm nhân sự thành công');

        return redirect()->route('nhansu.nhom-nhan-su.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = $this->nhomNhanSuRepository->findById($id);
        if( empty( $model ) ) {
            session()->flash('error', 'Nhóm nhân sự không tồn tại');
            return redirect()->route('nhansu.nhom-nhan-su.index');
        }

        $this->nhomNhanSuRepository->delete( $model );

        session()->flash('success', 'Bạn đã xóa nhóm nhân sự thành công');

        return redirect()->route('nhansu.nhom-nhan-su.index');
    }
}
