@extends('adminlte.Layout.app')
@section('styles')
    <style>
        label {
            font-weight: 400 !important;
        }

        .nav-link {
            font-weight: 500;
        }

        .select22 .select2-container .select2-selection--single {
            height: calc(2.25rem + 1px) !important;
        }
    </style>
@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2()

            // $('.jsCreateAccount').on('click', function() {
            //     const btn = $(this);
            //     const form = btn.closest("form");
            //     let nhanVienId = btn.data('nhan-vien-id')
            //     let token = $('meta[name="_token"]').attr('content');
            //     $.post("{{ route('nhansu.nhan-vien.taoAccount') }}", form.serialize() +
            //         `&nhan_vien_id=${nhanVienId}` + `&_token=${token}`,
            //         function(response) {
            //             form.find("button").prop("disabled", true);

            //             if (response.status === "success") {
            //                 toastr.success(response.message)
            //             } else {
            //                 toastr.error(response.message)
            //             }
            //         }).done(function() {
            //         form.find("button").prop("disabled", false);
            //     });
            // });
        });
    </script>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center fw-bold" style="background-color: blue ;color: white">THÊM MỚI NHÂN VIÊN</h1>
        </div>
    </div>
    <div class="tab-content" id="vert-tabs-tabContent">
        <div class="tab-pane text-left fade active show" id="thong-tin-chung" role="tabpanel"
            aria-labelledby="thong-tin-chung-tab">
            <form method="POST" action="{{ route('nhansu.nhan-vien.store') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="ho_ten">Họ và tên<span style="color: red">*</span>:</label>
                        <div class="input-group">
                            <input type="text" id="name" class="form-control" name="ho_ten"
                                value="{{ old('ho_ten') }}" placeholder="Nhập họ và tên..." required>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="gioi_tinh">Giới tính<span style="color: red">*</span>: </label>
                        <select name="gioi_tinh" id="gioi_tinh" class="form-control">
                            @foreach (\App\Modules\Nhansu\src\Models\NhanVien::GIOI_TINH as $id => $gt)
                                <option value="{{ $id }}">{{ $gt }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="ngay_sinh" class="h6">Ngày sinh<span style="color: red">*</span>:</label>
                        <input type="date" id="ngay_sinh" class="form-control" name="ngay_sinh">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="email">Email: <small style="color: red"><i>(Hệ thống sẽ tự động tạo
                                    email)</i></small></label>
                        <div class="input-group mb-3">
                            <input type="email" id="email" class="form-control" name="email"
                                value="{{ old('email') }}" placeholder="Nhập email..." disabled>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="dien_thoai" class="h6">Điện thoại<span style="color: red">*</span>:</label>
                        <div class="input-group">
                            <input type="text" id="dien_thoai" class="form-control" name="dien_thoai_ca_nhan"
                                value="{{ old('dien_thoai_ca_nhan') }}" placeholder="Nhập sô diện thoại..." required>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 select22">
                        <label for="loai_ho_so">Loại hồ sơ<span style="color: red">*</span>: </label>
                        <select class="select2 form-control" name="loai_nhan_vien_id" id="loai_ho_so" style="width: 100%">
                            @foreach ($loaiNhanVien as $id => $ten)
                                <option value="{{ $id }}">{{ $ten }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="que_quan">Quê quán:</label>
                        <div class="input-group">
                            <input type="text" id="que_quan" class="form-control" name="que_quan"
                                value="{{ old('que_quan') }}" placeholder="Nhập quê quán...">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-house"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 select22">
                        <label for="dan_toc">Dân tộc: </label>
                        <select class="select2 form-control" name="dan_toc" id="dan_toc" style="width: 100%">
                            @foreach (\App\Modules\Nhansu\src\Models\ChiTietNhanVien::DAN_TOC as $id => $dt)
                                <option value="{{ $id }}">{{ $dt }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="ton_giao" class="h6">Tôn giáo:</label>
                        <div class="input-group">
                            <input type="text" id="ton_giao" class="form-control" name="ton_giao"
                                value="{{ old('ton_giao') }}" placeholder="Nhập tôn giáo...">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="dia_chi_thuong_tru">Địa chỉ thường trú<span style="color: red">*</span>:</label>
                        <div class="input-group">
                            <input type="text" id="dia_chi_thuong_tru" class="form-control"
                                value="{{ old('dia_chi_thuong_tru') }}" name="dia_chi_thuong_tru"
                                placeholder="Nhập địa chỉ thường trú...">
                            <div class="input-group-prepend" required>
                                <span class="input-group-text"><i class="bi bi-house-door-fill"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="dia_chi_tam_tru" class="h6">Địa chỉ tạm trú:</label>
                        <div class="input-group">
                            <input type="text" id="dia_chi_tam_tru" class="form-control"
                                value="{{ old('dia_chi_tam_tru') }}" name="dia_chi_tam_tru"
                                placeholder="Nhập địa chỉ tạm trú...">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-house"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="ma_so_thue">Mã số thuế:</label>
                        <div class="input-group">
                            <input type="text" id="ma_so_thue" class="form-control" name="ma_so_thue"
                                value="{{ old('ma_so_thue') }}" placeholder="Nhập mã số thuế...">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-upc"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="dien_thoai_cong_viec" class="h6">Điện thoại công việc:</label>
                        <div class="input-group">
                            <input type="text" id="dien_thoai_cong_viec" class="form-control"
                                value="{{ old('dien_thoai_cong_viec') }}" name="dien_thoai_cong_viec"
                                placeholder="Nhập số điện hoại công việc...">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-telephone-plus"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 select22">
                        <label for="hon_nhan">Tình trạng hôn nhân: </label>
                        <select class="select2 form-control" name="hon_nhan" id="hon_nhan" style="width: 100%">
                            @foreach (\App\Modules\Nhansu\src\Models\ChiTietNhanVien::TINH_TRANG_HON_NHAN as $id => $tt)
                                <option value="{{ $id }}">{{ $tt }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="email_phu" class="h6">Email phụ:</label>
                        <div class="input-group">
                            <input type="text" id="email_phu" class="form-control" name="email_phu"
                                value="{{ old('email_phu') }}" placeholder="Nhập email phụ...">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="ngay_bat_dau_lam_viec" class="h6">Ngày bắt đầu làm việc<span
                                style="color: red">*</span>:</label>
                        <input type="date" id="ngay_bat_dau_lam_viec" class="form-control" value=""
                            name="ngay_bat_dau_lam_viec">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ngay_ket_thuc_lam_viec" class="h6">Ngày kết thúc làm việc:</label>
                        <input type="date" id="ngay_ket_thuc_lam_viec" class="form-control" value=""
                            name="ngay_ket_thuc_lam_viec">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ngay_thuc_te_lam_viec" class="h6">Ngày thực tế làm việc:</label>
                        <input type="date" id="ngay_thuc_te_lam_viec" class="form-control" value=""
                            name="ngay_thuc_te_lam_viec">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="CMND" class="h6">CMND <span style="color: red">*</span>: </label>
                        <div class="input-group">
                            <input type="text" id="CMND" class="form-control" name="cmnd"
                                value="{{ old('cmnd') }}" placeholder="Nhập số CMND..." required>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-credit-card"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="ngay_cap_CMND" class="h6">Ngày cấp<span style="color: red">*</span>:
                        </label>
                        <input type="date" id="ngay_cap_CMND" class="form-control" value=""
                            name="ngay_cap_cmnd">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="noi_cap_CMND" class="h6">Nơi cấp<span style="color: red">*</span>:
                        </label>
                        <div class="input-group">
                            <input type="text" id="noi_cap_CMND" class="form-control" name="noi_cap_cmnd"
                                value="{{ old('noi_cap_cmnd') }}" placeholder="Nhập nơi cấp CMND..." required>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3 select22">
                        <label for="trinh_do_chuyen_mon">Trình độ chuyên môn<span style="color: red">*</span>:
                        </label>
                        <select class="select2 form-control" name="trinh_do_chuyen_mon" id="trinh_do_chuyen_mon" style="width: 100%">
                            @foreach (\App\Modules\Nhansu\src\Models\ChiTietNhanVien::TRINH_DO_CHUYEN_MON as $id => $td)
                                <option value="{{ $id }}">{{ $td }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="so_cchn" class="h6">Số CCHN: </label>
                        <div class="input-group">
                            <input type="text" id="so_cchn" class="form-control" name="so_cchn"
                                value="{{ old('so_cchn') }}" placeholder="Nhập số CCHN...">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bo_sung_HĐ_CM" class="h6">Bổ sung phạm vi HĐ CM: </label>
                        <div class="input-group">
                            <input type="text" id="bo_sung_HĐ_CM" class="form-control" name="bo_sung_pham_vi_cm"
                                value="{{ old('bo_sung_pham_vi_cm') }}" placeholder="Nhập bổ sung phạm vi HĐ CM...">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-map"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="ngay_cap_CCHN" class="h6">Ngày cấp CCHN: </label>
                        <input type="date" id="ngay_cap_CCHN" class="form-control" name="ngay_cap_cchn"
                            value="">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="dk_hanh_nghe_tai" class="h6">ĐK Hành nghề tại: </label>
                        <div class="input-group">
                            <input type="text" id="dk_hanh_nghe_tai" class="form-control"
                                value="{{ old('dang_ki_hanh_nghe_hien_tai') }}" name="dang_ki_hanh_nghe_hien_tai"
                                placeholder="Nhập nơi ĐK hành nghề...">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="bien_xe_o_to" class="h6">Biển xe ô tô:
                        </label>
                        <div class="input-group">
                            <input type="text" id="bien_xe_o_to" class="form-control" name="bien_oto"
                                value="{{ old('bien_oto') }}" placeholder="Nhập biển số xe ô tô...">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-car-front-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z" />
                                    </svg></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="bien_xe_may" class="h6">Biển xe máy</span>:</label>
                        <div class="input-group">
                            <input type="text" id="bien_xe_may" class="form-control" name="bien_xe_may"
                                value="{{ old('bien_xe_may') }}" placeholder="Nhập biển số xe máy...">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-bicycle"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="size_quan">Size quần<span style="color: red">*</span>:</label>
                        <div class="input-group">
                            <input type="text" id="size_quan" class="form-control" name="size_quan"
                                value="{{ old('size_quan') }}" placeholder="Nhập size quần...">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-list-ol"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="size_ao" class="h6">Size áo<span style="color: red">*</span>:</label>
                        <div class="input-group">
                            <input type="text" id="size_ao" class="form-control" name="size_ao"
                                value="{{ old('size_ao') }}" placeholder="Nhập size áo...">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-list-ol"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="size_giay_dep" class="h6">Size giày dép<span style="color: red">*</span>:</label>
                        <div class="input-group">
                            <input type="text" id="size_giay_dep" class="form-control" name="size_giay_dep"
                                value="{{ old('size_giay_dep') }}" placeholder="Nhập size giày dép...">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-list-ol"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="bang_lai" class="h6">Bằng lái:</label>
                        <div class="input-group">
                            <input type="text" id="bang_lai" class="form-control" name="bang_lai"
                                value="{{ old('bang_lai') }}" placeholder="Nhập bằng lái...">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-credit-card"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <a href="{{ route('nhansu.nhan-vien.create') }}" class="btn btn-info mb-2"
                            style="text-align: center">Làm mới <i class="bi bi-arrow-clockwise"></i></a>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3 ">
                        <button type="submit" class="btn btn-primary mb-2">Lưu <i class="bi bi-download"></i></button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@stop
