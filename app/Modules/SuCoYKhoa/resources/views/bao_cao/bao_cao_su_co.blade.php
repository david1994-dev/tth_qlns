<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BÁO CÁO SỰ CỐ Y KHOA</title>

    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/select2/dist/css/select2.min.css') }}" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .content {
                font-size: 16px;
                line-height: 20px;
            }
        }

        .content {
            font-size: 16px;
            line-height: 20px;
        }

        input[type="file"] {}

        .custom-file-upload {
            border: 1px solid #ccc;
            display: block;
            padding: 6px 12px;
            cursor: pointer;
            width: 150px;
        }
    </style>
    <style>
        .input:focus {
            border: none;
            outline: none;
            display: inline;
        }

        .input {
            border: none;
            display: inline;
        }

        .tieu_de {
            font-weight: 600;
            font-family: 'Times New Roman', Times, serif;
        }

        .noi_dung {
            margin-left: 220px;
            display: inline;
        }

        .khung_vien {
            border-width: 1px;
            border-style: solid;
            border-color: black;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                @if ($errors->count())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $e)
                                <li>{!! $e !!}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($message = session('error'))
                    <div class="alert alert-danger alert-block">
                        {!! $message !!}
                    </div>
                @endif
                @if ($message = session('success'))
                    <div class="alert alert-success alert-block">
                        {!! $message !!}
                    </div>
                @endif
            </div>
        </div>
        <form action="{{ route('sucoykhoa.taoBaoCao') }}" method="post" class="  rounded" style="margin: auto;"
            enctype="multipart/form-data">
            <input type="hidden" name="chi_nhanh_slug" value="{{ $chi_nhanh->slug }}">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-5">
                        <h6 class="tieu_de text-center text-uppercase">{{ $chi_nhanh->ten }}</h6>
                    </div>
                    <div class="col-7 ">
                        <h6 style="text-align: center" class="tieu_de">
                            CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h6>
                        <h6 style="text-align: center" class="tieu_de"><u>
                                Độc
                                lập- tự do - hạnh phúc</u></h6>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="tieu_de" style="text-align: center">BÁO CÁO SỰ CỐ Y KHOA</h5>
                        <div class="text-center"><i>(Ban hành kèm theo Thông tư số 43/2018/TT-BYT ngày 26/12/2018 của
                                Bộ trưởng Bộ Y tế)</i></div>
                        <div class="table-responsive-sm">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="tieu_de">HÌNH THỨC BÁO CÁO SỰ CỐ Y KHOA: <br>
                                            <input type="radio" name="hinh_thuc" value="Tự nguyện"> Tự nguyện <br>
                                            <input type="radio" name="hinh_thuc" value="Bắt buộc"> Bắt buộc
                                        </th>
                                        <th scope="col" class="tieu_de">
                                            <span>Số báo cáo/Mã số sự cố:</span> <br>
                                            <div class="row">
                                                <div class="col-md-3"><span>Ngày báo cáo:</span> </div>
                                                <div class="col-md-9"><input type="date" id="ngay_sinh"
                                                        class="form-control" name="ngay_bao_cao"
                                                        style="display: inline;"> </div>
                                            </div>
                                            <span>Đơn vị báo cáo:</span> <input type="text" class="input"
                                                value="{{ $chi_nhanh->ten }}" name="don_vi_bao_cao"
                                                placeholder="...................................">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="tieu_de"><span>Thông tin người bệnh</span></th>
                                        <th scope="col" class="tieu_de"><span>Đối tượng xảy ra sự cố</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span> Họ và tên:</span><input type="text" class="input"
                                                name="ho_ten_nguoi_benh" value="{{ old('ho_ten_nguoi_benh') ?? '' }}"
                                                placeholder="................................................................................................................................"
                                                style="width: 80%"> <br>
                                            <span>Số bệnh án:</span><input type="text" class="input"
                                                name="so_benh_an" value="{{ old('so_benh_an') ?? '' }}"
                                                placeholder="......................................................................................................................."
                                                style="width: 80%"> <br>
                                            <span>Ngày sinh:</span> <input type="date" id="ngay_sinh"
                                                class="form-control" name="ngay_sinh"
                                                style="width: 50% ;display: inline;"> <br>
                                            <span>Giới tính:</span> <input type="text" class="input"
                                                name="gioi_tinh" value="{{ old('gioi_tinh') ?? '' }}"
                                                placeholder="......................................................"
                                                style="width: 15%"> <br>
                                        </td>
                                        <td> <input type="radio" name="doi_tuong_xay_ra_su_co" value="Người bệnh">
                                            Người bệnh <br>
                                            <input type="radio" name="doi_tuong_xay_ra_su_co"
                                                value="Người nhà/khách đến thăm ">
                                            <span>Người nhà/khách đến thăm </span>
                                            <br>
                                            <input type="radio" name="doi_tuong_xay_ra_su_co"
                                                value="Nhân viên y tế ">
                                            <span>Nhân viên y tế</span>
                                            <br>
                                            <input type="radio" name="doi_tuong_xay_ra_su_co"
                                                value="Trang thiết bị/cơ sở hạ tầng">
                                            <span>Trang thiết bị/cơ sở hạ tầng</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="tieu_de">
                                            <span>Nơi xảy ra sự cố:</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tieu_de">
                                            <span>Khoa/phòng/vị trí xảy ra sự cố:</span> <br>
                                            <select class="js-example-basic-single" name="khoa_phong_ban_id"
                                                style="width: 100%">
                                                @foreach ($phongBan as $id => $name)
                                                    <option value="{{ $id }}">{{ $name }}</option>
                                                @endforeach
                                            </select>


                                        </td>
                                        <td class="tieu_de">
                                            <span>Vị trí cụ thể:</span> <br>
                                            <textarea style=" width: 100%; height: 100px;" cols="30" rows="10" name="vi_tri_cu_the" class="input">{{ old('vi_tri_cu_the') ?? '' }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span>Thời gian xảy ra sự cố:</span> <input type="datetime-local"
                                                id="ngay_sinh" class="form-control" name="ngay_su_co"
                                                style="width: 30% ;display: inline;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span>Mô tả ngắn gọn về sự cố:</span>
                                            <textarea style=" width: 100%; height: 100px;" cols="30" rows="10" name="mo_ta" class="input">{{ old('mo_ta') ?? '' }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span>Đề xuất giải pháp ban đầu:</span>
                                            <textarea style=" width: 100%; height: 100px;" cols="30" rows="10" name="de_xuat_giai_phap"
                                                class="input">{{ old('de_xuat_giai_phap') ?? '' }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <span>Điều trị/xử lí ban đầu đã được thực hiện</span>
                                            <textarea style=" width: 100%; height: 100px;" cols="30" rows="10" name="giai_phap_da_thuc_hien"
                                                class="input">{{ old('giai_phap_da_thuc_hien') ?? '' }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="col" class="tieu_de"><span>Thông báo cho Bác sĩ điều trị/người
                                                có trách nhiệm</span></td>
                                        <td scope="col" class="tieu_de"><span>Ghi nhận vào hồ sơ bệnh án/giấy tờ
                                                liên quan</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="radio" name="thong_bao_bac_si" value="Có"> Có
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="radio" name="thong_bao_bac_si" value="Không">
                                                    Không
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="radio" name="thong_bao_bac_si"
                                                        value="Không ghi nhận">
                                                    Không
                                                    ghi nhận
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="radio" name="ghi_nhan_vao_ho_so" value="Có">
                                                    Có
                                                </div>
                                                <div class="col-md-4"><input type="radio" name="ghi_nhan_vao_ho_so"
                                                        value="Không"> Không</div>
                                                <div class="col-md-4"><input type="radio" name="ghi_nhan_vao_ho_so"
                                                        value="Không ghi nhận">
                                                    Không ghi
                                                    nhận</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>Thông báo cho người nhà/người bảo hộ</span>
                                        </td>
                                        <td>
                                            <span>Thông báo cho người bệnh</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4"><input type="radio"
                                                        name="thong_bao_nguoi_nha" value="Có"> Có</div>
                                                <div class="col-md-4"><input type="radio"
                                                        name="thong_bao_nguoi_nha" value="Không"> Không</div>
                                                <div class="col-md-4"><input type="radio"
                                                        name="thong_bao_nguoi_nha" value="Không ghi nhận">Không ghi
                                                    nhận</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4"><input type="radio"
                                                        name="thong_bao_benh_nhan" value="Có"> Có</div>
                                                <div class="col-md-4"><input type="radio"
                                                        name="thong_bao_benh_nhan" value="Không"> Không</div>
                                                <div class="col-md-4"><input type="radio"
                                                        name="thong_bao_benh_nhan" value="Không ghi nhận">
                                                    Không ghi nhận</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="tieu_de">
                                            <span>Phân loại ban đầu về sự cố</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="radio" name="phan_loai_ban_dau" value="Chưa xảy ra"> Chưa
                                            xảy ra
                                            <input type="radio" name="phan_loai_ban_dau" value="Đã xảy ra"
                                                style="margin-left: 30%"> Đã xảy ra
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="tieu_de">
                                            <div class="row">
                                                <div class="col-md-4"><span>Đánh giá ban đầu về mức độ ảnh hưởng của sự
                                                        cố: </span></div>
                                                <div class="col-md-8">
                                                    <select class="js-example-basic-single" name="muc_do"
                                                        style="width: 100%">
                                                        @foreach (\App\Modules\SuCoYKhoa\Helpers\ConfigHelper::MUC_DO_TON_THUONG as $id => $name)
                                                            <option value="{{ $id }}">{{ $name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="tieu_de">
                                            <div class="row">
                                                <div class="col-md-2"><span>Nhóm sự cố:</span></div>
                                                <div class="col-md-10">
                                                    <select class="js-example-basic-single" name="nhom_su_co"
                                                        style="width: 100%">
                                                        @foreach (\App\Modules\SuCoYKhoa\Helpers\ConfigHelper::NHOM_SU_CO as $id => $name)
                                                            <option value="{{ $id }}">{{ $name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="tieu_de">
                                            <span>Thông tin người báo cáo</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <span>Họ tên:</span><input type="text" class="input"
                                                        name="ho_ten_nguoi_bao_cao"
                                                        value="{{ old('ho_ten_nguoi_bao_cao') ?? '' }}"
                                                        placeholder="......................................................................................................................................................................................................................................."
                                                        style=" display: inline">
                                                </div>
                                                <div class="col-md-3">
                                                    <span>SĐT:</span> <input
                                                        value="{{ old('dien_thoai_nguoi_bao') ?? '' }}"
                                                        type="text" class="input" name="dien_thoai_nguoi_bao"
                                                        placeholder="..............................................................................................................................................................................................................................................................."
                                                        style=" display: inline">
                                                </div>
                                                <div class="col-md-3">
                                                    <span>Email:</span> <input type="text"
                                                        value="{{ old('email_nguoi_bao') ?? '' }}"
                                                        name="email_nguoi_bao" class="input"
                                                        placeholder="............................................................................................................................................................................................................................................................"
                                                        style=" display: inline">
                                                </div>
                                                <div class="col-md-3">
                                                    <span>MSNV:</span> <input type="text" name="msnv"
                                                        class="input"
                                                        placeholder="............................................................................................................................................................................................................................."
                                                        style=" display: inline">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="row">
                                                <div class="col-md-4"><input type="radio" name="doi_tuong_bao_cao"
                                                        value="Điều dưỡng (chức danh)"> Điều dưỡng
                                                    (chức danh)</div>
                                                <div class="col-md-4"><input type="radio" name="doi_tuong_bao_cao"
                                                        value="Người bệnh"> Người bệnh</div>
                                                <div class="col-md-4"><input type="radio" name="doi_tuong_bao_cao"
                                                        value="Người nhà/khách đến thăm"> Người
                                                    nhà/khách đến thăm </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="radio" name="doi_tuong_bao_cao"
                                                        value="Bác sỹ (chức danh)"> Bác sỹ (chức danh)
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="radio" name="doi_tuong_bao_cao"
                                                        value="Khác (ghi cụ thể)"> Khác
                                                    (ghi cụ thể): <input type="text" name="doi_tuong_bao_cao_khac"
                                                        class="input"
                                                        value="{{ old('doi_tuong_bao_cao_khac') ?? '' }}"
                                                        placeholder="....................................................................................."
                                                        style=" display: inline">
                                                </div>
                                            </div>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <span>Người chứng kiến 1:</span> <input type="text" class="input"
                                                value="{{ old('nguoi_chung_kien_1') ?? '' }}"
                                                name="nguoi_chung_kien_1"
                                                placeholder="................................................................................"
                                                style=" display: inline">
                                        </td>
                                        <td class="text-center">
                                            <span>Người chứng kiến 2:</span>
                                            <input type="text" class="input" name="nguoi_chung_kien_2"
                                                value="{{ old('nguoi_chung_kien_2') ?? '' }}"
                                                placeholder="................................................................................"
                                                style="display: inline">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <label class="btn btn-info col fileinput-button dz-clickable" id="image">
                            <input type="file" name="images[]" multiple class="d-none" id="image"
                                onchange="loadFile(event)" accept="image/*">
                            <i class="fas fa-upload"></i>
                            <span> Tải lên hình ảnh sự cố</span>
                        </label>

                        <div id="output" ></div>

                        <div class="row">
                            <div class="col-8">
                            </div>
                            <div class="col-4 ">
                                <button type="submit" class="btn btn-primary">--Ký tên--</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div><!-- /.container-fluid -->
    </div>
</body>

</html>
<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/select2/dist/js/select2.min.js') }}"></script>

<script>
    const img = (src) => `<img src=${src} width="560px" height="300px"/>`;

    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.innerHTML = '';

        [...event.target.files].forEach(
            (file) => (output.innerHTML += img(URL.createObjectURL(file)))
        );
    };

    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    $("#image").on("change", function() {
    if ($("#image")[0].files.length > 2) {
        alert("You can select only 2 images");
    } else {
        $("#imageUploadForm").submit();
    }
});
</script>
