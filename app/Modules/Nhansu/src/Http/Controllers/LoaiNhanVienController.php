<?php

namespace App\Modules\Nhansu\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationRequest;
use App\Modules\Nhansu\src\Repositories\Interface\LoaiNhanVienRepositoryInterface;
use Illuminate\Http\Request;

class LoaiNhanVienController extends Controller
{
    private LoaiNhanVienRepositoryInterface $loaiNhanVienRepository;

    public function __construct(LoaiNhanVienRepositoryInterface $loaiNhanVienRepository)
    {
        $this->loaiNhanVienRepository = $loaiNhanVienRepository;
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
        $paginate['baseUrl']    = route('nhansu.loai-nhan-vien.index');
        $keyword = $request->get('keyword');

        $filter = [];
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->loaiNhanVienRepository->countByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);
        $models = $this->loaiNhanVienRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'Nhansu::loai_nhan_vien.index',
            [
                'models'    => $models,
                'count' => $count,
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
        return view('Nhansu::loai_nhan_vien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $input = $request->only(['ten']);
        $input['nguoi_cap_nhat_id'] = $user->id;

        $loaiNhanVien = $this->loaiNhanVienRepository->create($input);

        if (!$loaiNhanVien) {
            return redirect()
                ->back()
                ->withErrors('Tạo loại nhân viên thất bại');
        }

        session()->flash('success', 'Bạn đã tạo loại nhân viên thành công');

        return redirect()->route('nhansu.loai-nhan-vien.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = $this->loaiNhanVienRepository->findById($id);
        if (empty($model)) abort(404);

        return view('Nhansu::loai_nhan_vien.edit', [
            'model' => $model,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = auth()->user();
        $model = $this->loaiNhanVienRepository->findById($id);
        if (empty($model)) abort(404);

        $input = $request->only(['ten']);
        $input['nguoi_cap_nhat_id'] = $user->id;

        $isSuccess = $this->loaiNhanVienRepository->update($model, $input);

        if (!$isSuccess) {
            return redirect()
                ->back()
                ->withErrors('Cập loại nhân viên thất bại');
        }

        session()->flash('success', 'Bạn đã cập loại nhân viên thành công');

        return redirect()->route('nhansu.loai-nhan-vien.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = $this->loaiNhanVienRepository->findById($id);
        if( empty( $model ) ) {
            session()->flash('error', 'Loại nhân viên không tồn tại');
            return redirect()->route('nhansu.loai-nhan-vien.index');
        }

        $this->loaiNhanVienRepository->delete( $model );

        session()->flash('success', 'Bạn đã xóa loại nhân viên thành công');

        return redirect()->route('nhansu.loai-nhan-vien.index');
    }
}
