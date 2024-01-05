@php
    use Illuminate\Support\Arr;

    $chiTietUngVien = $model->chi_tiet ?? [];
    $quaTrinhLamViec = $model->qua_trinh_lam_viec ?? [];
    $viTriLamViec = $model->vi_tri_lam_viec ?? [];
    $donViUngTuyen = $model->don_vi_ung_tuyen ?? [];
    $vanBang = Arr::get($chiTietUngVien, 'van_bang', []);
    $hinhThucDaoTao = Arr::get($chiTietUngVien, 'hinh_thuc_dao_tao', []);
    $ungTuyen = Arr::get($chiTietUngVien, 'ung_tuyen', []);
    $nguonTuyenDung = Arr::get($chiTietUngVien, 'nguon_tuyen_dung', []);
    $thoiHanHopDong = Arr::get($chiTietUngVien, 'thoi_han_hop_dong', '');
    $loaiTotNghiep = Arr::get($chiTietUngVien, 'loai_tot_nghiep', '');
    $trinhDo = Arr::get($chiTietUngVien, 'trinh_do', '');
    $loaiHinhDaoTao = Arr::get($chiTietUngVien, 'loai_hinh_dao_tao', '');
    $honNhan = Arr::get($chiTietUngVien, 'hon_nhan', '');
    $lopHocNangCao = Arr::get($chiTietUngVien, 'hoc_lop_nang_cao', '');
@endphp
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHIẾU KHẢO SÁT ỨNG VIÊN VĂN PHÒNG</title>

    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('bieu_mau/css/bieu_mau.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        @media print {
            body {
                width: 400mm;
                height: 297mm;
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

        label {
            font-weight: normal !important;
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
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="container-fluid ">
        <div class="content">
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
            <form id="ksVPForm" method="post" class="border border-2 border-success rounded" style="margin: auto;"
                enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            @if (!$model->image)
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRK9A2qlhiiaIkO6qETm9ihfEy7AGvj3eAnH7fd-MQxqxouWOja2pxD9KE6JiLgn-gYOk&usqp=CAU"
                                    alt="" width="100px" height="130px">
                            @else
                                <img src="{{ asset('storage/' . $model->image) }}" alt="" width="100px"
                                    height="130px">
                            @endif
                        </div>
                        <div class="col-9 ">
                            <div style="text-align: right;"><i>Ngày</i><input type="number" class="input"
                                    value="{{ $model->created_at->day }}" name="ngay_khao_sat" style="width: 5%;"
                                    placeholder="...."><i>Tháng</i><input type="number" class="input"
                                    name="thang_khao_sat" style="width: 5%;" value="{{ $model->created_at->month }}"
                                    placeholder="...."><i>Năm</i><input type="number" class="input"
                                    value="{{ $model->created_at->year }}" name="nam_khao_sat" style=" width: 10%;"
                                    placeholder="........"></div>
                            <h4 class="tieu_de" style="margin-left: 70px;">
                                PHIẾU
                                KHẢO SÁT ỨNG VIÊN</h4>
                            <i style="margin-left: 70px;">(Đối tượng áp dụng: vị trí Văn phòng)</i>
                            <p style="font-weight: 600;"> Vị trí ứng tuyển: <input name="vi_tri_ung_tuyen"
                                    class="input" value="{{ $model->vi_tri_ung_tuyen }}" style=" width: 40%;"
                                    placeholder="................................................................................................................................................">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <p style="display: inline;">
                        </div>
                        <div class="col-md-10">
                            <p>Để phục vụ cho công tác tuyển dụng cán bộ-nhân viên vào làm việc tại Công
                                ty
                                và các chi nhánh</p>
                            <p>Kính đề nghị ứng viên trả lời 1 số câu hỏi khảo sát sau:</p>
                            <div>
                                <p style="display: inline;">Họ và tên:</p> <input class="input" name="ho_ten"
                                    value="{{ $model->vi_tri_ung_tuyen }}" style="width: 30%;"
                                    placeholder="..............................................................................................">
                                <div style="text-align: right; display: inline;">
                                    <p style="display: inline;">Sinh ngày</p><input type="number" class="input"
                                        value="{{ $model->ngay_sinh->day }}" style="width: 3%;" name="ngay_sinh"
                                        placeholder="........">
                                    <p style="display: inline;">Tháng</p><input type="number" class="input"
                                        style="width: 3%;" value="{{ $model->ngay_sinh->month }}" name="thang_sinh"
                                        placeholder="........">
                                    <p style="display: inline;">Năm</p><input type="number" class="input"
                                        style="width: 8%;" value="{{ $model->ngay_sinh->year }}" name="nam_sinh"
                                        placeholder=".............">
                                </div> <br>

                                <p style="display: inline;">Địa chỉ:</p> <input class="input" name="dia_chi"
                                    value="{{ $model->dia_chi }}" style="width: 60%;"
                                    placeholder="......................................................................................................................................................."><br>
                                <p style="display: inline;">Điện thoại:</p> <input class="input" name="dien_thoai"
                                    value="{{ $model->dien_thoai }}" style="width: 30%;"
                                    placeholder="......................................................................">
                                Email:
                                <input class="input" style=" width: 30%;" type="email" name="email"
                                    value="{{ $model->email }}"
                                    placeholder="................................................................."><br>
                                <p style="display: inline;">Trường đào tạo:</p> <input class="input"
                                    style="width: 50%;" value="{{ Arr::get($chiTietUngVien, 'truong_dao_tao', '') }}"
                                    name="truong_dao_tao"
                                    placeholder="..........................................................................................................................................">
                                <br>
                                <p style="display: inline;">Chuyên ngành đào tạo:</p> <input class="input"
                                    value="{{ Arr::get($chiTietUngVien, 'chuyen_nganh_dao_tao', '') }}"
                                    style="width: 30%;" name="chuyen_nganh_dao_tao"
                                    placeholder="......................................................................">
                                Hệ đào
                                tạo:
                                <input name="he_dao_tao" class="input" style="width: 25%;"
                                    value="{{ Arr::get($chiTietUngVien, 'he_dao_tao', '') }}"
                                    placeholder="..................................."><br>
                                <p style="display: inline;">Tốt nghiệp loại:</p>
                                <input type="radio" name="loai_tot_nghiep" value="Giỏi"> Giỏi
                                <input type="radio" name="loai_tot_nghiep" value="Khá"> Khá
                                <input type="radio" name="loai_tot_nghiep" value="TB Khá"> TB Khá
                                <input type="radio" name="loai_tot_nghiep" value="Trung bình"> Trung bình <br>
                                <p style="display: inline;">Loại hình đào tạo: </p>
                                <input type="radio" name="loai_hinh_dao_tao" value="Chính quy"> Chính quy
                                <input type="radio" name="loai_hinh_dao_tao" value="Liên thông/vừa học vừa làm">
                                Liên
                                thông/vừa
                                học vừa làm <br>

                                <p style="display: inline;">Chiều cao:</p> <input name="chieu_cao" class="input"
                                value="{{ Arr::get($chiTietUngVien, 'chieu_cao', '') }}" style="width: 30%;" 
                                    placeholder="......................................................................">
                                Cân nặng:
                                <input name="can_nang" class="input" style="width: 25%;" class="input"
                                value="{{ Arr::get($chiTietUngVien, 'can_nang', '') }}" 
                                    placeholder="........................................................."><br>
                                <p style="display: inline;">Tình trạng hôn nhân: </p>
                                <input type="radio" name="hon_nhan" value="Độc thân"> Độc thân
                                <input type="radio" name="hon_nhan" value="Đã có gia đình"> Đã có gia đình
                                <p style="display: inline; margin-left: 100px;">Số con: </p> <input class="input"
                                value="{{ Arr::get($chiTietUngVien, 'so_con', '') }}"  name="so_con" style="width: 20%;"
                                    placeholder="......................................................................"><br>
                            </div> <br>
                            <p style="font-weight: 600; display: inline;"> 1.Quá trình công tác:</p> <i>(Dành
                                cho
                                những người đã có kinh nghiệm công tác)</i> <br>
                                <div class="table-responsive-md">
                                    <table class="table table-bordered" style="width: 50%;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Thời gian</th>
                                                <th scope="col">Đơn vị công tác</th>
                                                <th scope="col">Vị trí làm việc</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($quaTrinhLamViec as $date => $value)
                                                <tr>
                                                    <td style="width: 100px; height: 50px; "><input
                                                            name="thoi_gian_lam_viec[]" value="{{ $date }}"
                                                            class="input"></td>
                                                    @foreach ($value as $cty => $viTri)
                                                        <td style="width: 300px ; height: 50px;"><input
                                                                name="don_vi_cong_tac[]" value="{{ $cty }}"
                                                                class="input" style="width: 280px">
                                                        </td>
                                                        <td style="width: 300px ; height: 50px;"><input
                                                                name="vi_tri_lam_viec[]" value="{{ $viTri }}"
                                                                class="input" style="width: 280px">
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> <br>
                            <p style="font-weight: 600; display: inline;"> 2.Anh(chị) có khả năng(Thời gian,
                                kinh
                                tế,
                                ...) để tiếp tục học các lớp nâng cao nghiệp vụ không?</p><br>
                            <input type="radio" name="hoc_lop_nang_cao" value="co"> a. Có
                            <input type="radio" name="hoc_lop_nang_cao" value="khong"> b. Không
                            <br> <br>
                            <p style="font-weight: 600; display: inline;"> 3.Anh(chị) biết thông tin tuyển dụng
                                của
                                Công ty qua kênh nào?</p><br>
                            <div>
                                <input type="checkbox" name="nguon_tuyen_dung[]" value="Người thân giới thiệu">
                                Người
                                thân
                                giới thiệu
                                <input type="checkbox" name="nguon_tuyen_dung[]" value="Facebook"
                                    style="margin-left: 85px;">
                                Facebook
                                <input type="checkbox" name="nguon_tuyen_dung[]" value="Báo chí/ Truyền hình"
                                    style="margin-left: 82px;"> Báo chí/ Truyền hình
                            </div>
                            <div>
                                <input type="checkbox" name="nguon_tuyen_dung[]" value="Web/fanpage Công ty">
                                Web/fanpage
                                Công ty
                                <input type="checkbox" name="nguon_tuyen_dung[]" value="Vietnamwork"
                                    style="margin-left: 82px;">
                                Vietnamwork
                                <input type="checkbox" name="nguon_tuyen_dung[]" value="Nguồn khác"
                                    style="margin-left: 57px;">
                                Nguồn khác
                            </div> <br>
                            <p style="font-weight: 600; display: inline;"> 4.Anh(chị) đồng ý chuyển vị trí công
                                việc
                                (nếu đạt PV) qua vị trí nào sau đây? </p><br>
                            <i>- Đánh dấu 3 vị trí theo thứ tự ưu tiên </i>
                            <div>
                                <input type="checkbox" name="ung_tuyen[]" value="Nhân viên kinh doanh"> 
                                <label for="Nhân viên kinh doanh">Nhân viên kinh doanh</label>
                                <input type="checkbox" name="ung_tuyen[]" value="NV Thiết kế"
                                    style="margin-left: 35px;"> 
                                    <label for="NV Thiết kế">NV Thiết kế</label>
                                <input type="checkbox" name="ung_tuyen[]" value="Nhân viên truyền thông"
                                    style="margin-left: 50px;"> 
                                    <label for="Nhân viên truyền thông">Nhân viên truyền thông</label>
                            </div>
                            <div>
                                <input type="checkbox" name="ung_tuyen[]" value="Nhân viên hành chính"> 
                                <label for="Nhân viên hành chính">Nhân viên hành chính</label>
                                <input type="checkbox" name="ung_tuyen[]" value="Nhân viên CSKH"
                                    style="margin-left: 36px;">
                                    <label for="Nhân viên CSKH">Nhân viên CSKH</label>
                                <input type="checkbox" name="ung_tuyen[]" value="Nhân viên quản trị web"
                                    style="margin-left: 17px;">
                                    <label for="Nhân viên quản trị web">Nhân viên quản trị web</label>
                            </div>
                            <div>
                                <input type="checkbox" name="ung_tuyen[]" value="NV Tư vấn PTTM"> NV
                                <label for="NV Tư vấn PTTM">NV Tư vấn PTTM</label>
                                <input type="checkbox" name="ung_tuyen[]" value="CV Nhân sự"
                                    style="margin-left: 72px;">
                                    <label for="CV Nhân sự">CV Nhân sự</label>
                                <input type="checkbox" name="ung_tuyen[]" value="NV Điện nước"
                                    style="margin-left: 50px;"> 
                                    <label for="NV Điện nước">NV Điện nước</label>
                            </div>
                            <div>
                                <input type="checkbox" name="ung_tuyen[]" value="NV Thu ngân - Lễ tân"> 
                                <label for="NV Thu ngân - Lễ tân">NV Thu ngân - Lễ tân</label>
                                <input type="checkbox" name="ung_tuyen[]" value="NV Văn thư"
                                    style="margin-left: 39px;">
                                    <label for="NV Văn thư">NV Văn thư</label>
                                <input type="checkbox" name="ung_tuyen[]" value="NV Kế hoạch"
                                    style="margin-left: 53px;"> 
                                    <label for="NV Kế hoạch">NV Kế hoạch</label>
                            </div>
                            <div>
                                <input type="checkbox" name="ung_tuyen[]" value="NV Kế toán"> 
                                <label for="NV Kế toán">NV Kế toán</label>
                                <input type="checkbox" name="ung_tuyen[]" value="NV Lái xe"
                                    style="margin-left: 110px;">
                                    <label for="NV Lái xe">NV Lái xe</label>
                                <input type="checkbox" name="ung_tuyen[]" value="NV Thiết kế phần"
                                    style="margin-left: 67px;">
                                    <label for="NV Thiết kế phần">NV Thiết kế phần</label>
                            </div>
                            <div>
                                <input type="checkbox" name="ung_tuyen[]" value="NV Pháp chế"> 
                                <label for="NV Pháp chế">NV Pháp chế</label>
                                <input type="checkbox" name="ung_tuyen[]" value="NV Bảo vệ"
                                    style="margin-left: 99px;">
                                    <label for="NV Bảo vệ">NV Bảo vệ</label>
                                <input type="checkbox" name="ung_tuyen[]" value="NV Quản lý dự án"
                                    style="margin-left: 61px;">
                                    <label for="NV Quản lý dự án">NV Quản lý dự án</label>
                            </div>
                            <div>
                                <input type="checkbox" name="ung_tuyen[]" value="Khác"> 
                                <label for="Khác">Khác</label>
                                <input type="checkbox" name="ung_tuyen[]" value="NV IT"
                                    style="margin-left: 155px;"> 
                                    <label for="NV IT">NV IT</label>
                                <input type="checkbox" name="ung_tuyen[]" value="NV Đối ngoại và quan hệ QT"
                                    style="margin-left: 95px;"> 
                                    <label for="NV Đối ngoại và quan hệ QT">NV Đối ngoại và quan hệ QT</label>
                            </div> <br>

                            <p style="font-weight: 600; display: inline;"> 5.Điểm yếu?</p><br>
                            <textarea style=" width: 80%; height: 100px;" cols="30" rows="10" name="diem_yeu">{{Arr::get($chiTietUngVien, 'diem_yeu', '')}}</textarea> <br> <br>
                            <p style="font-weight: 600; display: inline;">
                                6.Điểm mạnh?</p><br>
                            <textarea style="width: 80%; height: 100px;" cols="30" rows="10" name="diem_manh">{{Arr::get($chiTietUngVien, 'diem_manh', '')}}</textarea> <br> <br>
                            <p style="font-weight: 600; display: inline;"> 7.Mục tiêu ngắn hạn/dài hạn của
                                anh(chị)
                                là gì?</p><br>
                            <textarea style=" width: 80%; height: 100px;" cols="30" rows="10" name="muc_tieu">{{Arr::get($chiTietUngVien, 'muc_tieu', '')}}</textarea> <br> <br>
                            <p style="font-weight: 600; display: inline;"> 8.Mức lương mong muốn của anh(chị)
                                khi
                                vào
                                làm việc tại công ty?</p><br>
                            <textarea required style=" width: 80%; height: 100px;" cols="30" rows="10" name="luong_mong_muon">{{Arr::get($chiTietUngVien, 'luong_mong_muon', '')}}</textarea> <br> <br>
                            <p style="font-weight: 600; display: inline;"> 9.Anh(chị) có kiến nghị, đề xuất hoặc
                                thắc
                                mắc muốn Công ty giải đáp không?</p><br>
                            <textarea style=" width: 80%; height: 100px;" cols="30" rows="10" name="de_xuat">{{Arr::get($chiTietUngVien, 'de_xuat', '')}}</textarea>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-6">
                        </div>
                        <div class="col-6 ">
                            <h5
                                style="font-weight: 600;font-family: 'Times New Roman', Times, serif; display: inline;padding-left: 20%">
                                ỨNG VIÊN
                            </h5> <br>
                            <i style="padding-left: 20%">(Ký,ghi rõ họ tên)</i> <br> <br>
                            <div style="padding-left: 20%">
                                {{ $model->ho_ten }} <br>
                                <small>{{ $model->ngay_ky->format('d-m-Y H:i:s') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                <input type="hidden" name="loai_ung_vien"
                    value="{{ \App\Modules\Nhansu\src\Models\UngVien::LOAI_UNG_VIEN_VAN_PHONG }}">
            </form>
            {{-- <form id="ksVPForm" action="" method="post"
              class="w-75 border border-2 border-success p-5 rounded" style="margin: auto;">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        @if (!$model->image)
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRK9A2qlhiiaIkO6qETm9ihfEy7AGvj3eAnH7fd-MQxqxouWOja2pxD9KE6JiLgn-gYOk&usqp=CAU"
                                 alt="" width="100px" height="130px">
                        @else
                            <img src="{{asset('storage/'.$model->image)}}"
                                 alt="" width="100px" height="130px">
                        @endif
                    </div>
                    <div class="col-9 ">
                        <div style="text-align: right;"><i>Ngày</i><input type="number" class="input"
                                                                          value="{{$model->created_at->day}}"
                                                                          name="ngay_khao_sat" style="width: 40px;" placeholder="...."><i>Tháng</i><input
                                type="number" class="input" name="thang_khao_sat" style="width: 40px;"
                                value="{{$model->created_at->month}}"
                                placeholder="...."><i>Năm</i><input type="number" class="input"
                                                                    value="{{$model->created_at->year}}"
                                                                    name="nam_khao_sat" style=" width: 70px;" placeholder="........"></div>
                        <h4 class="tieu_de" style="margin-left: 70px;">
                            PHIẾU
                            KHẢO SÁT ỨNG VIÊN</h4>
                        <i style="margin-left: 70px;">(Đối tượng áp dụng: vị trí Văn phòng)</i>
                        <p style="margin-left: 70px;font-weight: 600;"> Vị trí ứng tuyển: <input
                                name="vi_tri_ung_tuyen" class="input" style=" width: 300px;"
                                value="{{$model->vi_tri_ung_tuyen}}"
                                placeholder="................................................................................................................................................">
                    </div>
                </div>
            </div>
            <br>
            <p style="margin-left: 220px;">Để phục vụ cho công tác tuyển dụng cán bộ-nhân viên vào làm việc tại Công
                ty
                và các chi nhánh</p>
            <p style="margin-left: 220px;">Kính đề nghị ứng viên trả lời 1 số câu hỏi khảo sát sau:</p>
            <div style="margin-left: 220px;">
                <p style="display: inline;">Họ và tên:</p> <input class="input" name="ho_ten"
                                                                  value="{{$model->ho_ten}}"
                                                                  style="width: 350px;"
                                                                  placeholder="..............................................................................................">
                <div style="text-align: right; display: inline;">
                    <p style="display: inline;">Sinh ngày</p><input type="number" class="input"
                                                                    value="{{$model->ngay_sinh->day}}"
                                                                    style="width: 40px;" name="ngay_sinh" placeholder="........">
                    <p style="display: inline;">Tháng</p><input type="number" class="input" style="width: 40px;"
                                                                value="{{$model->ngay_sinh->month}}"
                                                                name="thang_sinh" placeholder="........">
                    <p style="display: inline;">Năm</p><input type="number" class="input" style="width: 60px;"
                                                              value="{{$model->ngay_sinh->year}}"
                                                              name="nam_sinh" placeholder=".............">
                </div> <br>
                <p style="display: inline;">Địa chỉ:</p> <input class="input" name="dia_chi" style="width: 602px;"
                                                                value="{{$model->dia_chi}}"
                                                                placeholder="......................................................................................................................................................."><br>
                <p style="display: inline;">Điện thoại:</p> <input class="input" name="dien_thoai"
                                                                   value="{{$model->dien_thoai}}"
                                                                   style="width: 300px;"
                                                                   placeholder="......................................................................"> Email:
                <input class="input" style=" width: 232px;" type="email" name="email"
                       value="{{$model->email}}"
                       placeholder="................................................................."><br>
                <p style="display: inline;">Trường đào tạo:</p> <input class="input" style="width: 546px;"
                                                                       value="{{Arr::get($chiTietUngVien, 'truong_dao_tao', '')}}"
                                                                       name="truong_dao_tao"
                                                                       placeholder="..........................................................................................................................................">
                <br>
                <p style="display: inline;">Chuyên ngành đào tạo:</p> <input class="input" style="width: 300px;"
                                                                             value="{{Arr::get($chiTietUngVien, 'chuyen_nganh_dao_tao', '')}}"
                                                                             name="chuyen_nganh_dao_tao"
                                                                             placeholder="......................................................................"> Hệ đào
                tạo:
                <input name="he_dao_tao" class="input" style="width: 115px;"
                       value="{{Arr::get($chiTietUngVien, 'he_dao_tao', '')}}"
                       placeholder="..................................."><br>
                <p style="display: inline;">Tốt nghiệp loại:</p>
                <input type="radio" name="loai_tot_nghiep" value="Giỏi"> Giỏi
                <input type="radio" name="loai_tot_nghiep" value="Khá"> Khá
                <input type="radio" name="loai_tot_nghiep" value="TB Khá"> TB Khá
                <input type="radio" name="loai_tot_nghiep" value="Trung bình"> Trung bình <br>
                <p style="display: inline;">Loại hình đào tạo: </p>
                <input type="radio" name="loai_hinh_dao_tao" value="Chính quy"> Chính quy
                <input type="radio" name="loai_hinh_dao_tao" value="Liên thông/vừa học vừa làm"> Liên thông/vừa
                học vừa làm <br>

                <p style="display: inline;">Chiều cao:</p> <input name="chieu_cao" class="input"
                                                                  value="{{Arr::get($chiTietUngVien, 'chieu_cao', '')}}"
                                                                  style="width: 300px;"
                                                                  placeholder="......................................................................"> Cân nặng:
                <input name="can_nang" class="input" style="width: 210px;"
                       value="{{Arr::get($chiTietUngVien, 'can_nang', '')}}"
                       placeholder="........................................................."><br>
                <p style="display: inline;">Tình trạng hôn nhân: </p>
                <input type="radio" name="hon_nhan" value="Độc thân"> Độc thân
                <input type="radio" name="hon_nhan" value="Đã có gia đình"> Đã có gia đình
                <p style="display: inline; margin-left: 100px;">Số con: </p> <input class="input" name="so_con"
                                                                                    value="{{Arr::get($chiTietUngVien, 'so_con', '')}}"
                                                                                    style="width: 168px;"
                                                                                    placeholder="......................................................................"><br>
            </div> <br>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 1.Quá trình công tác:</p> <i>(Dành
                cho
                những người đã có kinh nghiệm công tác)</i> <br>
            <table class="table table-bordered" style="width: 800px; margin-left: 180px">
                <thead>
                <tr>
                    <th scope="col">Thời gian</th>
                    <th scope="col">Đơn vị công tác</th>
                    <th scope="col">Vị trí làm việc</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($quaTrinhLamViec as $date => $value)
                    <tr>
                        <td style="width: 100px; height: 50px; "><input name="thoi_gian_lam_viec[]" class="input" value="{{$date}}">
                        </td>
                        @foreach ($value as $cty => $viTri)
                            <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]" class="input" value="{{$cty}}"
                                                                            style="width: 280px"></td>
                            <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]" class="input" value="{{$viTri}}"
                                                                            style="width: 280px"></td>
                        @endforeach

                    </tr>
                @endforeach
                </tbody>
            </table> <br>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 2.Anh(chị) có khả năng(Thời gian,
                kinh
                tế,
                ...) để tiếp tục học các lớp nâng cao nghiệp vụ không?</p><br>
            <input type="radio" name="hoc_lop_nang_cao" value="co" style="margin-left: 180px;"> a. Có
            <input type="radio" name="hoc_lop_nang_cao" value="khong" style="margin-left: 180px;"> b. Không
            <br> <br>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 3.Anh(chị) biết thông tin tuyển dụng
                của
                Công ty qua kênh nào?</p><br>
            <div>
                <input type="checkbox" name="nguon_tuyen_dung[]" value="Người thân giới thiệu"
                       style="margin-left: 180px;">
                Người
                thân
                giới thiệu
                <input type="checkbox" name="nguon_tuyen_dung[]" value="Facebook" style="margin-left: 85px;">
                Facebook
                <input type="checkbox" name="nguon_tuyen_dung[]" value="Báo chí/ Truyền hình"
                       style="margin-left: 82px;"> Báo chí/ Truyền hình
            </div>
            <div>
                <input type="checkbox" name="nguon_tuyen_dung[]" value="Web/fanpage Công ty"
                       style="margin-left: 180px;"> Web/fanpage Công ty
                <input type="checkbox" name="nguon_tuyen_dung[]" value="Vietnamwork" style="margin-left: 82px;">
                Vietnamwork
                <input type="checkbox" name="nguon_tuyen_dung[]" value="Nguồn khác" style="margin-left: 57px;">
                Nguồn khác
            </div> <br>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 4.Anh(chị) đồng ý chuyển vị trí công
                việc
                (nếu đạt PV) qua vị trí nào sau đây? </p><br>
            <i style="margin-left: 220px;">- Đánh dấu 3 vị trí theo thứ tự ưu tiên </i>
            <div>
                <input type="checkbox" name="ung_tuyen[]" value="Nhân viên kinh doanh"
                       style="margin-left: 180px;">
                <label for="'Nhân viên kinh doanh">Nhân viên kinh doanh</label>
                <input type="checkbox" name="ung_tuyen[]" value="NV Thiết kế" style="margin-left: 35px;">
                <label for="NV Thiết kế">NV Thiết kế</label>
                <input type="checkbox" name="ung_tuyen[]" value="Nhân viên truyền thông"
                       style="margin-left: 50px;">
                <label for="Nhân viên truyền thông">Nhân viên truyền thông</label>
            </div>
            <div>
                <input type="checkbox" name="ung_tuyen[]" value="Nhân viên hành chính"
                       style="margin-left: 180px;">
                <label for="Nhân viên hành chính">Nhân viên hành chính</label>
                <input type="checkbox" name="ung_tuyen[]" value="Nhân viên CSKH" style="margin-left: 36px;">
                <label for="Nhân viên CSKH">Nhân viên CSKH</label>
                <input type="checkbox" name="ung_tuyen[]" value="Nhân viên quản trị web"
                       style="margin-left: 17px;">
                <label for="Nhân viên quản trị web">Nhân viên quản trị web</label>
            </div>
            <div>
                <input type="checkbox" name="ung_tuyen[]" value="NV Tư vấn PTTM" style="margin-left: 180px;">
                <label for="NV Tư vấn PTTM">NV Tư vấn PTTM</label>
                <input type="checkbox" name="ung_tuyen[]" value="CV Nhân sự" style="margin-left: 72px;">
                <label for="CV Nhân sự">CV Nhân sự</label>
                <input type="checkbox" name="ung_tuyen[]" value="NV Điện nước" style="margin-left: 50px;">
                <label for="NV Điện nước">NV Điện nước</label>
            </div>
            <div>
                <input type="checkbox" name="ung_tuyen[]" value="NV Thu ngân - Lễ tân"
                       style="margin-left: 180px;">
                <label for="NV Thu ngân - Lễ tân">NV Thu ngân - Lễ tân</label>
                <input type="checkbox" name="ung_tuyen[]" value="NV Văn thư" style="margin-left: 39px;">
                <label for="NV Văn thư">NV Văn thư</label>
                <input type="checkbox" name="ung_tuyen[]" value="NV Kế hoạch" style="margin-left: 53px;">
                <label for="NV Kế hoạch">NV Kế hoạch</label>
            </div>
            <div>
                <input type="checkbox" name="ung_tuyen[]" value="NV Kế toán" style="margin-left: 180px;">
                <label for="NV Kế toán">NV Kế toán</label>
                <input type="checkbox" name="ung_tuyen[]" value="NV Lái xe" style="margin-left: 110px;">
                <label for="NV Lái xe">NV Lái xe</label>
                <input type="checkbox" name="ung_tuyen[]" value="NV Thiết kế phần mềm" style="margin-left: 67px;">
                <label for="NV Thiết kế phần mềm">NV Thiết kế phần mềm</label>
            </div>
            <div>
                <input type="checkbox" name="ung_tuyen[]" value="NV Pháp chế" style="margin-left: 180px;">
                <label for="NV Pháp chế">NV Pháp chế</label>
                <input type="checkbox" name="ung_tuyen[]" value="NV Bảo vệ" style="margin-left: 99px;">
                <label for="NV Bảo vệ">NV Bảo vệ</label>
                <input type="checkbox" name="ung_tuyen[]" value="NV Quản lý dự án" style="margin-left: 61px;">
                <label for="NV Quản lý dự án">NV Quản lý dự án</label>
            </div>
            <div>
                <input type="checkbox" name="ung_tuyen[]" value="Khác" style="margin-left: 180px;">
                <label for="Khác">Khác</label>
                <input type="checkbox" name="ung_tuyen[]" value="NV IT" style="margin-left: 155px;">
                <label for="NV IT">NV IT</label>
                <input type="checkbox" name="ung_tuyen[]" value="NV Đối ngoại và quan hệ QT"
                       style="margin-left: 95px;">
                <label for="NV Đối ngoại và quan hệ QT">NV Đối ngoại và quan hệ QT</label>
            </div> <br>

            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 5.Điểm yếu?</p><br>
            <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="diem_yeu">
                {{Arr::get($chiTietUngVien, 'diem_yeu', '')}}
            </textarea> <br> <br>
            <p style="margin-left: 180px;font-weight: 600; display: inline;">
                6.Điểm mạnh?</p><br>
            <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="diem_manh">
                {{Arr::get($chiTietUngVien, 'diem_manh', '')}}
            </textarea> <br> <br>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 7.Mục tiêu ngắn hạn/dài hạn của
                anh(chị)
                là gì?</p><br>
            <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="muc_tieu">
                {{Arr::get($chiTietUngVien, 'muc_tieu', '')}}
            </textarea> <br> <br>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 8.Mức lương mong muốn của anh(chị)
                khi
                vào
                làm việc tại công ty?</p><br>
            <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10"
                      name="luong_mong_muon">
                {{Arr::get($chiTietUngVien, 'luong_mong_muon', '')}}
            </textarea> <br> <br>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 9.Anh(chị) có kiến nghị, đề xuất hoặc
                thắc
                mắc muốn Công ty giải đáp không?</p><br>
            <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="de_xuat">
                {{Arr::get($chiTietUngVien, 'de_xuat', '')}}
            </textarea>
            <br>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-6">
                    </div>
                    <div class="col-6 ">
                        <h5
                            style="font-weight: 600;font-family: 'Times New Roman', Times, serif; display: inline;margin-left: 190px;">
                            ỨNG VIÊN
                        </h5> <br>
                        <i style="margin-left: 175px;">(Ký,ghi rõ họ tên)</i>
                        <div style="margin-left: 190px;">
                            {{$model->ho_ten}} <br>
                            <small>{{$model->ngay_ky->format('d-m-Y H:i:s')}}</small>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="loai_ung_vien"
                   value="{{ \App\Modules\Nhansu\src\Models\UngVien::LOAI_UNG_VIEN_VAN_PHONG }}">
        </form> --}}

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
<script>
    $(document).ready(function() {
        $('#ksVPForm :input').prop("readonly", true);
        $("input[type=checkbox]").click(function() {
            return false;
        });
        $("input[type=radio]").click(function() {
            return false;
        });

        let ungTuyen = @json($ungTuyen);
        $("input[type=checkbox][name=ung_tuyen\\[\\]]").each(function() {
            let val = $(this).val()
            if (ungTuyen.includes(val)) {
                $(this).attr('checked', true)
            }

            let index = ungTuyen.indexOf(val)
            if (index >= 0) {
                index += 1;
                let text = $('label[for="' + val + '"]').text();
                text = text + ' (' + index + ')';
                $('label[for="' + val + '"]').text(text)
            }
        });

        let hinhThucDaoTao = @json($hinhThucDaoTao);
        $("input[type=checkbox][name=hinh_thuc_dao_tao\\[\\]]").each(function() {
            let val = $(this).val()
            if (hinhThucDaoTao.includes(val)) {
                $(this).attr('checked', true)
            }
        });

        let vanBang = @json($vanBang);
        $("input[type=checkbox][name=van_bang\\[\\]]").each(function() {
            let val = $(this).val()
            if (vanBang.includes(val)) {
                $(this).attr('checked', true)
            }
        });

        let donVi = @json($donViUngTuyen);
        $("input[type=checkbox][name=don_vi_ung_tuyen\\[\\]]").each(function() {
            let val = $(this).val()
            if (donVi.includes(val)) {
                $(this).attr('checked', true)
            }
        });

        let nguonTuyenDung = @json($nguonTuyenDung);
        $("input[type=checkbox][name=nguon_tuyen_dung\\[\\]]").each(function() {
            let val = $(this).val()
            if (nguonTuyenDung.includes(val)) {
                $(this).attr('checked', true)
            }
        });

        let thoiHanHopDong = @json($thoiHanHopDong);
        $("input[type=radio][name=thoi_han_hop_dong]").each(function() {
            let val = $(this).val()
            if (thoiHanHopDong === val) {
                $(this).attr('checked', true)
            }
        });

        let loaiTotNghiep = @json($loaiTotNghiep);
        $("input[type=radio][name=loai_tot_nghiep]").each(function() {
            let val = $(this).val()
            if (loaiTotNghiep === val) {
                $(this).attr('checked', true)
            }
        });

        let trinhDo = @json($trinhDo);
        $("input[type=radio][name=trinh_do]").each(function() {
            let val = $(this).val()
            if (trinhDo === val) {
                $(this).attr('checked', true)
            }
        });

        let loaiHinhDaoTao = @json($loaiHinhDaoTao);
        $("input[type=radio][name=loai_hinh_dao_tao]").each(function() {
            let val = $(this).val()
            if (loaiHinhDaoTao === val) {
                $(this).attr('checked', true)
            }
        });

        let honNhan = @json($honNhan);
        $("input[type=radio][name=hon_nhan]").each(function() {
            let val = $(this).val()
            if (honNhan === val) {
                $(this).attr('checked', true)
            }
        });

        let lopHocNangCao = @json($lopHocNangCao);
        $("input[type=radio][name=hoc_lop_nang_cao]").each(function() {
            let val = $(this).val()
            if (lopHocNangCao === val) {
                $(this).attr('checked', true)
            }
        });
    })
</script>
