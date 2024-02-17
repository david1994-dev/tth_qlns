<?php

namespace App\Modules\Nhansu\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationRequest;
use App\Modules\Nhansu\src\Models\ThongBao;
use App\Modules\Nhansu\src\Models\ThongBaoUser;
use App\Modules\Nhansu\src\Repositories\Interface\ChiNhanhRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\PhongBanRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\ThongBaoRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\ThongBaoUserRepositoryInterface;
use App\Services\FileService;
use Illuminate\Http\Request;

class ThongBaoController extends Controller
{
    private ThongBaoRepositoryInterface $thongBaoRepository;
    private FileService $fileService;
    private ChiNhanhRepositoryInterface $chiNhanhRepository;
    private PhongBanRepositoryInterface $phongBanRepository;

    public function __construct(
        ThongBaoRepositoryInterface $thongBaoRepository,
        FileService $fileService,
        ChiNhanhRepositoryInterface $chiNhanhRepository,
        PhongBanRepositoryInterface $phongBanRepository
    ) {
        $this->thongBaoRepository = $thongBaoRepository;
        $this->fileService = $fileService;
        $this->chiNhanhRepository = $chiNhanhRepository;
        $this->phongBanRepository = $phongBanRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(PaginationRequest $request)
    {
        $user = auth()->user();
        $paginate['limit']      = $request->limit();
        $paginate['offset']     = $request->offset();
        $paginate['order']      = $request->order();
        $paginate['direction']  = $request->direction();
        $paginate['baseUrl']    = route('nhansu.thong-bao.index');
        $keyword = $request->get('keyword');

        $filter = [];
        if (!empty($keyword)) {
            $filter['query'] = $keyword;
        }

        $count = $this->thongBaoRepository->countNotifications($user, $filter);
        $models = $this->thongBaoRepository->getNotifications($user, $filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);
        $models = $this->thongBaoRepository->load($models, ['userRead', 'loaiThongBao']);
        $thongBaoByType = $this->thongBaoRepository->countByType($user, $filter);

        return view(
            'Nhansu::thong_bao.index',
            [
                'models'    => $models,
                'count'         => $count,
                'paginate'      => $paginate,
                'keyword'       => $keyword,
                'thongBaoByType' => $thongBaoByType
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $chiNhanh = $this->chiNhanhRepository->all();
        $phongBan = $this->phongBanRepository->all();

        return view('Nhansu::thong_bao.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $input = $request->only(['title', 'content']);
        $input['creator_id'] = $user->id;
        $files = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $image = $this->fileService->uploadFile('thongbao', $file, 'file');
                if (!empty($image)) {
                    $files[] = $file;
                }
            }
        }

        $input['files'] = $files;

        $receiveIds = $request->get('receive_ids', []);
        $isSuccess = $this->thongBaoRepository->taoThongBao($input, $receiveIds);

        if (!$isSuccess) {
            return redirect()
                ->back()
                ->withErrors('Tạo thông báo thất bại');
        }

        session()->flash('success', 'Bạn đã tạo thông báo thành công');

        return redirect()->route('nhansu.thong-bao.index');
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
