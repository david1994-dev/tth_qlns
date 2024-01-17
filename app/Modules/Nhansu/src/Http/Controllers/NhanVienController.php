<?php

namespace App\Modules\Nhansu\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationRequest;
use App\Modules\Nhansu\src\Http\Requests\NhanVien\NhanVienRequest;
use App\Modules\Nhansu\src\Repositories\Interface\NhanVienRepositoryInterface;
use App\Repositories\Interface\UserRepositoryInterface;
use App\Repositories\Interface\UserRoleRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class NhanVienController extends Controller
{
    private NhanVienRepositoryInterface $nhanVienRepository;
    private UserRepositoryInterface $userRepository;
    private UserRoleRepositoryInterface $userRoleRepository;


    public function __construct(
        UserRepositoryInterface $userRepository,
        UserRoleRepositoryInterface $userRoleRepository,
        NhanVienRepositoryInterface $nhanVienRepository
    ) {
        $this->userRepository = $userRepository;
        $this->userRoleRepository = $userRoleRepository;
        $this->nhanVienRepository = $nhanVienRepository;
    }

    public function index(PaginationRequest $request)
    {
        $paginate['limit']      = $request->limit();
        $paginate['offset']     = $request->offset();
        $paginate['order']      = $request->order();
        $paginate['direction']  = $request->direction();
        $paginate['baseUrl']    = route('nhansu.nhan-vien.index');
        $keyword = $request->get('keyword');

        $filter = [];
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->nhanVienRepository->countByFilter($filter);
        $models = $this->nhanVienRepository->getByFilter($filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);
        $this->nhanVienRepository->load($models, 'chiNhanh');

        return view(
            'Nhansu::nhan_vien.index',
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

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
        $model = $this->nhanVienRepository->findById($id);
        $model = $this->nhanVienRepository->load($model, 'chiTietNhanVien');
        if (!$model) abort(404);

        return view('Nhansu::nhan_vien.chi_tiet', [
            'model' => $model
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }

    public function sodotochuc($id)
    {

    }
}
