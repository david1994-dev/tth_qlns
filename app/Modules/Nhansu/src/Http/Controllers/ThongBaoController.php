<?php

namespace App\Modules\Nhansu\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationRequest;
use App\Modules\Nhansu\Helpers\ThongBaoHelper;
use App\Modules\Nhansu\src\Models\ThongBao;
use App\Modules\Nhansu\src\Models\ThongBaoUser;
use App\Modules\Nhansu\src\Repositories\Interface\ChiNhanhRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\LoaiThongBaoRepositoryInterface;
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
    private LoaiThongBaoRepositoryInterface $loaiThongBaoRepository;

    private ThongBaoUserRepositoryInterface $thongBaoUserRepository;

    public function __construct(
        ThongBaoRepositoryInterface $thongBaoRepository,
        FileService $fileService,
        ChiNhanhRepositoryInterface $chiNhanhRepository,
        PhongBanRepositoryInterface $phongBanRepository,
        LoaiThongBaoRepositoryInterface $loaiThongBaoRepository,
        ThongBaoUserRepositoryInterface $thongBaoUserRepository
    ) {
        $this->thongBaoRepository = $thongBaoRepository;
        $this->fileService = $fileService;
        $this->chiNhanhRepository = $chiNhanhRepository;
        $this->phongBanRepository = $phongBanRepository;
        $this->loaiThongBaoRepository = $loaiThongBaoRepository;
        $this->thongBaoUserRepository = $thongBaoUserRepository;
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

        $filter['category'] = $request->get('category', '');
        $filter['created_at_from'] = $request->get('created_at_from');
        $filter['created_at_to'] = $request->get('created_at_to');

        $count = $this->thongBaoRepository->countNotifications($user, $filter);
        $models = $this->thongBaoRepository->getNotifications($user, $filter, $paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit']);
        $models = $this->thongBaoRepository->load($models, ['loaiThongBao', 'nguoiGui.nhanVien']);
        $thongBaoUnreadByType = $this->thongBaoRepository->countUnReadByType($user, $filter);
        $loaiThongBao = $this->loaiThongBaoRepository->all();

        return view(
            'Nhansu::thong_bao.index',
            [
                'models'    => $models,
                'count'         => $count,
                'paginate'      => $paginate,
                'keyword'       => $keyword,
                'thongBaoUnreadByType' => $thongBaoUnreadByType,
                'loaiThongBao' => $loaiThongBao
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
        $user = auth()->user();
        $model = $this->thongBaoRepository->findById($id);
        if (!$model) abort(404);

        if (!ThongBaoHelper::userCanReadNotification($user, $model)) {
            abort(403);
        }

        $this->thongBaoUserRepository->firstOrCreate([
            'user_id' => $user->id,
            'thong_bao_id' => $model->id,
            'status' => ThongBaoUser::STATUS_DA_DOC
        ]);

        return view('Nhansu::thong_bao.detail', [
            'model' => $model
        ]);
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
