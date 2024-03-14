<?php

namespace App\Modules\Nhansu\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationRequest;
use App\Modules\Nhansu\src\Repositories\Interface\ViTriCongViecRepositoryInterface;
use Illuminate\Http\Request;

class ViTriCongViecController extends Controller
{
    private ViTriCongViecRepositoryInterface $viTriCongViecRepository;

    public function __construct(ViTriCongViecRepositoryInterface $viTriCongViecRepository)
    {
        $this->viTriCongViecRepository = $viTriCongViecRepository;
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
        $paginate['baseUrl']    = route('nhansu.vi-tri-cong-viec.index');
        $keyword = $request->get('keyword');

        $filter = [];
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->viTriCongViecRepository->countByFilter($filter);
        $models = $this->viTriCongViecRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'Nhansu::vi_tri_cong_viec.index',
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
        return view('Nhansu::vi_tri_cong_viec.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $input = $request->only(['ten']);
        $input['nguoi_tao_id'] = $user->id;

        $phongBan = $this->viTriCongViecRepository->create($input);

        if (!$phongBan) {
            return redirect()
                ->back()
                ->withErrors('Tạo vị trí công việc thất bại');
        }

        session()->flash('success', 'Bạn đã tạo vị trí công việc thành công');

        return redirect()->route('nhansu.vi-tri-cong-viec.index');
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
        $model = $this->viTriCongViecRepository->findById($id);
        if (empty($model)) abort(404);

        return view('Nhansu::vi_tri_cong_viec.edit', [
            'model' => $model,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = auth()->user();
        $model = $this->viTriCongViecRepository->findById($id);
        if (empty($model)) abort(404);

        $input = $request->only(['ten']);
        $input['nguoi_tao_id'] = $user->id;

        $isSuccess = $this->viTriCongViecRepository->update($model, $input);

        if (!$isSuccess) {
            return redirect()
                ->back()
                ->withErrors('Cập nhật vị trí công việc thất bại');
        }

        session()->flash('success', 'Bạn đã cập nhật vị trí công việc thành công');

        return redirect()->route('nhansu.vi-tri-cong-viec.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = $this->viTriCongViecRepository->findById($id);
        if( empty( $model ) ) {
            session()->flash('error', 'Vị trí công việc không tồn tại');
            return redirect()->route('nhansu.vi_tri_cong_viec.index');
        }

        $this->viTriCongViecRepository->delete( $model );

        session()->flash('success', 'Bạn đã xóa vị trí công việc thành công');

        return redirect()->route('nhansu.vi_tri_cong_viec.index');
    }
}
