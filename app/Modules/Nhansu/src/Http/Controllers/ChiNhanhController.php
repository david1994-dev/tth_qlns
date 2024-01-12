<?php

namespace App\Modules\Nhansu\src\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Modules\Nhansu\src\Repositories\Interface\ChiNhanhRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChiNhanhController extends Controller
{

    private ChiNhanhRepositoryInterface $chinhanhRepository;
    public function __construct(ChiNhanhRepositoryInterface $chinhanhRepository)
    {
        $this->chinhanhRepository = $chinhanhRepository;
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
