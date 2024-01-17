<?php

namespace App\Modules\Nhansu\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Nhansu\src\Repositories\Interface\PhongBanRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\SoDoToChucRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoDoToChucController extends Controller
{
    private SoDoToChucRepositoryInterface $soDoToChucRepository;
    private PhongBanRepositoryInterface $phongBanRepository;
    public function __construct(
        SoDoToChucRepositoryInterface $soDoToChucRepository,
        PhongBanRepositoryInterface $phongBanRepository
    ) {
        $this->soDoToChucRepository = $soDoToChucRepository;
        $this->phongBanRepository = $phongBanRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $input = $request->only(['phong_ban_id', 'chi_nhanh_id', 'ma_vi_tri']);
        $input['parent_id'] = $request->get('parent_id', 0);
        $input['nguoi_cap_nhat_id'] = $user->id;

        $sodo = $this->soDoToChucRepository->create($input);
        if (empty($sodo)) {
            session()->flash('error', 'Tạo sơ đồ thất bại!');
            return redirect()
                ->back();
        }

        session()->flash('success', 'Bạn đã tạo sơ đồ thành công');

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
        $model = $this->soDoToChucRepository->findById($id);
        if (!$model) abort(404);

        $phongBan = $this->phongBanRepository->findById($model->phong_ban_id);
        $soDoToChuc = $this->soDoToChucRepository->allByFilter(['phong_ban_id' => $phongBan->id], 'id', 'asc');

        return view('Nhansu::phong_ban.sodotochuc', [
            'model' => $model,
            'phongBan' => $phongBan,
            'soDoToChuc' => $soDoToChuc,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = auth()->user();
        $model = $this->soDoToChucRepository->findById($id);
        if (!$model) abort(404);

        $input = $request->only(['ma_vi_tri']);
        $input['nguoi_cap_nhat_id'] = $user->id;

        $isSuccess = $this->soDoToChucRepository->update($model, $input);
        if (!$isSuccess) {
            session()->flash('error', 'Cập nhật sơ đồ thất bại!');
            return redirect()
                ->back();
        }

        session()->flash('success', 'Bạn đã cập nhật sơ đồ thành công');

        return redirect()
            ->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = $this->soDoToChucRepository->findById($id);
        if (!$model) abort(404);

        DB::beginTransaction();
        try {
            $this->soDoToChucRepository->delete($model);
            $this->soDoToChucRepository->deleteChild($model);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        session()->flash('success', 'Bạn đã xóa sơ đồ thành công');

        return response()->json(['message' => 'deleted!']);
    }
}
