<?php

namespace App\Modules\Nhansu\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationRequest;
use App\Modules\Nhansu\src\Repositories\Interface\LoaiThongBaoRepositoryInterface;
use Illuminate\Http\Request;

class LoaiThongBaoController extends Controller
{

    private LoaiThongBaoRepositoryInterface $loaiThongBaoRepository;

    public function __construct(LoaiThongBaoRepositoryInterface $loaiThongBaoRepository)
    {
        $this->loaiThongBaoRepository = $loaiThongBaoRepository;
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
        $paginate['baseUrl']    = route('nhansu.loai-thong-bao.index');
        $keyword = $request->get('keyword');

        $filter = [];
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->loaiThongBaoRepository->countByFilter($filter);
        $models = $this->loaiThongBaoRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'Nhansu::loai_thong_bao.index',
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
        return view('Nhansu::loai_thong_bao.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $input = $request->only(['ten']);
        $input['nguoi_tao_id'] = $user->id;

        $phongBan = $this->loaiThongBaoRepository->create($input);

        if (!$phongBan) {
            return redirect()
                ->back()
                ->withErrors('Tạo loại thông báo thất bại');
        }

        session()->flash('success', 'Bạn đã tạo loại thông báo thành công');

        return redirect()->route('nhansu.loai-thong-bao.index');
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
        $model = $this->loaiThongBaoRepository->findById($id);
        if (empty($model)) abort(404);

        return view('Nhansu::loai_thong_bao.edit', [
            'model' => $model,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = auth()->user();
        $model = $this->loaiThongBaoRepository->findById($id);
        if (empty($model)) abort(404);

        $input = $request->only(['ten']);
        $input['nguoi_tao_id'] = $user->id;

        $isSuccess = $this->loaiThongBaoRepository->update($model, $input);

        if (!$isSuccess) {
            return redirect()
                ->back()
                ->withErrors('Cập nhật loại thông báo thất bại');
        }

        session()->flash('success', 'Bạn đã cập nhật loại thông báo thành công');

        return redirect()->route('nhansu.loai-thong-bao.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = $this->loaiThongBaoRepository->findById($id);
        if( empty( $model ) ) {
            session()->flash('error', 'Loại thông báo không tồn tại');
            return redirect()->route('nhansu.loai_thong_bao.index');
        }

        $this->loaiThongBaoRepository->delete( $model );

        session()->flash('success', 'Bạn đã xóa loại thông báo thành công');

        return redirect()->route('nhansu.loai_thong_bao.index');
    }
}
