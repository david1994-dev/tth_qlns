<?php

namespace App\Modules\Nhansu\src\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaginationRequest;
use App\Modules\Nhansu\Helpers\ThongBaoHelper;
use App\Modules\Nhansu\src\Models\ThongBao;
use App\Modules\Nhansu\src\Models\ThongBaoUser;
use App\Modules\Nhansu\src\Repositories\Interface\ChiNhanhRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\LoaiThongBaoRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\NhomNhanSuRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\PhongBanRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\ThongBaoPhanHoiRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\ThongBaoRepositoryInterface;
use App\Modules\Nhansu\src\Repositories\Interface\ThongBaoUserRepositoryInterface;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ThongBaoController extends Controller
{
    private ThongBaoRepositoryInterface $thongBaoRepository;
    private FileService $fileService;
    private ChiNhanhRepositoryInterface $chiNhanhRepository;
    private PhongBanRepositoryInterface $phongBanRepository;
    private LoaiThongBaoRepositoryInterface $loaiThongBaoRepository;

    private ThongBaoUserRepositoryInterface $thongBaoUserRepository;
    private ThongBaoPhanHoiRepositoryInterface $thongBaoPhanHoiRepository;
    private NhomNhanSuRepositoryInterface $nhomNhanSuRepository;

    public function __construct(
        ThongBaoRepositoryInterface $thongBaoRepository,
        FileService $fileService,
        ChiNhanhRepositoryInterface $chiNhanhRepository,
        PhongBanRepositoryInterface $phongBanRepository,
        LoaiThongBaoRepositoryInterface $loaiThongBaoRepository,
        ThongBaoUserRepositoryInterface $thongBaoUserRepository,
        ThongBaoPhanHoiRepositoryInterface $thongBaoPhanHoiRepository,
        NhomNhanSuRepositoryInterface $nhomNhanSuRepository,
    ) {
        $this->thongBaoRepository = $thongBaoRepository;
        $this->fileService = $fileService;
        $this->chiNhanhRepository = $chiNhanhRepository;
        $this->phongBanRepository = $phongBanRepository;
        $this->loaiThongBaoRepository = $loaiThongBaoRepository;
        $this->thongBaoUserRepository = $thongBaoUserRepository;
        $this->thongBaoPhanHoiRepository = $thongBaoPhanHoiRepository;
        $this->nhomNhanSuRepository = $nhomNhanSuRepository;
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
        $chiNhanh = $this->chiNhanhRepository->select(['ten', 'id']);
        $phongBan = $this->phongBanRepository->select(['ten', 'id']);
        $nhomNguoiDung = $this->nhomNhanSuRepository->select(['ten', 'id']);
        $loaiThongBao = $this->loaiThongBaoRepository->all();

        return view('Nhansu::thong_bao.create', [
            'chiNhanh' => $chiNhanh,
            'phongBan' => $phongBan,
            'nhomNguoiDung' => $nhomNguoiDung,
            'loaiThongBao' => $loaiThongBao
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $input = $request->only([
            'tieu_de', 'noi_dung', 'gui_tat_ca', 'chi_nhanh_ids',
            'nhom_nguoi_nhan_ids', 'phong_ban_ids', 'nguoi_nhan_ids', 'muc_do', 'loai_thong_bao', 'xuat_ban'
        ]);
        $input['creator_id'] = $user->id;
        $files = [];
        if ($request->hasFile('fileInput')) {
            foreach ($request->file('fileInput') as $file) {
                $fileExt = $file->getClientMimeType();
                if ($this->fileService->isImage($fileExt)) {
                    $fileUploaded = $this->fileService->uploadFile('thongbao', $file);
                } else {
                    $fileUploaded = $this->fileService->uploadFile('thongbao', $file, 'file');
                }
                if (!empty($fileUploaded)) {
                    $files[] = $fileUploaded;
                }
            }
        }

        $input['dinh_kem'] = $files;
        $input['nguoi_gui_id'] = $user->id;
        $input['slug'] = Str::slug($input['tieu_de']);
        $isSuccess = $this->thongBaoRepository->create($input);

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
        $filter = [];
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

        $thongBaoUnreadByType = $this->thongBaoRepository->countUnReadByType($user, $filter);
        $loaiThongBao = $this->loaiThongBaoRepository->all();

        return view('Nhansu::thong_bao.detail', [
            'model' => $model,
            'loaiThongBao' => $loaiThongBao,
            'thongBaoUnreadByType' => $thongBaoUnreadByType,
        ]);
    }

    public function reply(Request $request, $id)
    {
        $model = $this->thongBaoRepository->findById($id);
        if (!$model) abort(404);

        $input = $request->only(['nguoi_nhan_ids', 'noi_dung', 'gui_tat_ca']);
        $input['thong_bao_id'] = $id;
        $input['nguoi_gui_id'] = auth()->user()->id;
        $files = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $image = $this->fileService->uploadFile('thongbaophanhoi', $file, 'file');
                if (!empty($image)) {
                    $files[] = $file;
                }
            }
        }

        $input['dinh_kem'] = $files;
        $this->thongBaoPhanHoiRepository->create($input);

        session()->flash('success', 'Bạn đã phản hồi thông báo thành công');

        return redirect()->route('nhansu.thong-bao.show', $id);

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

    public function uploadImage(Request $request)
    {
        //todo validate image
        $image = $this->fileService->uploadFile('thong_bao' ,$request->file('file'));

        return response()->json(['location' => asset('storage/' . $image)]);
    }
}
