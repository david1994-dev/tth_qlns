<?php

namespace App\Modules\Nhansu\src\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationRequest;
use App\Modules\Nhansu\src\Repositories\Interface\ChiNhanhRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\PhongBanRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ChiNhanhController extends Controller
{

    private ChiNhanhRepositoryInterface $chinhanhRepository;
    private PhongBanRepositoryInterface $phongBanRepository;
    public function __construct(
        ChiNhanhRepositoryInterface $chinhanhRepository,
        PhongBanRepositoryInterface $phongBanRepository
    ) {
        $this->chinhanhRepository = $chinhanhRepository;
        $this->phongBanRepository = $phongBanRepository;
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
        $paginate['baseUrl']    = route('nhansu.chi-nhanh.index');
        $keyword = $request->get('keyword');

        $filter = [];
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->chinhanhRepository->countByFilter($filter);
        $models = $this->chinhanhRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);

        return view(
            'Nhansu::chi_nhanh.index',
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
        return view('Nhansu::chi_nhanh.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $input = $request->only(['ma', 'ten']);
        $input['slug'] = Str::slug($input['ten']);
        $input['nguoi_cap_nhat_id'] = $user->id;

        $chiNhanh = $this->chinhanhRepository->create($input);

        if (!$chiNhanh) {
            return redirect()
                ->back()
                ->withErrors('Tạo chi nhánh thất bại');
        }

        session()->flash('success', 'Bạn đã tạo chi nhánh thành công');

        return redirect()->route('nhansu.chi-nhanh.index');
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
        $model = $this->chinhanhRepository->findById($id);
        if (empty($model)) abort(404);

        return view('Nhansu::chi_nhanh.edit', [
            'model' => $model
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = auth()->user();
        $model = $this->chinhanhRepository->findById($id);
        if (empty($model)) abort(404);
        $input = $request->only(['ma', 'ten']);
        $input['slug'] = Str::slug($input['ten']);
        $input['nguoi_cap_nhat_id'] = $user->id;

        $this->chinhanhRepository->update($model, $input);

        session()->flash('success', 'Bạn đã cập nhật chi nhánh thành công');

        return redirect()->route('nhansu.chi-nhanh.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = $this->chinhanhRepository->findById($id);
        if( empty( $model ) ) {
            session()->flash('error', 'Chi nhánh không tồn tại');
            return redirect()
                ->back();
        }

        DB::beginTransaction();
        try {
            $this->chinhanhRepository->delete( $model );
            $this->phongBanRepository->deleteByFilter(['chi_nhanh_id' => $model->id]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        session()->flash('success', 'Bạn đã xóa chi nhánh thành công');

        return redirect()
            ->back();
    }
}
