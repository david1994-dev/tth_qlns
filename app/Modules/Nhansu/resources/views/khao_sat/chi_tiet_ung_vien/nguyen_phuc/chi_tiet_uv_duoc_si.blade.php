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
    $chungChiHanhNghe = Arr::get($chiTietUngVien, 'chung_chi_hanh_nghe', '');
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
    <title>PHIẾU KHẢO SÁT ỨNG VIÊN DƯỢC SỸ</title>

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
    <div class="container-fluid">
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
            <form id="ksDSForm" method="post" class=" border border-2 border-success rounded" style="margin: auto;"
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
                            <div style="text-align: right;"><i>Ngày</i>
                               <input type="number" class="input"
                                    value="{{ $model->created_at->day }}" name="ngay_khao_sat" style="width: 5%; font-style:italic"
                                    placeholder="....">
                                    <i>Tháng</i><input type="number" class="input"
                                    name="thang_khao_sat" style="width: 5%;font-style:italic" value="{{ $model->created_at->month }}"
                                    placeholder="...."><i>Năm</i><input type="number" class="input"
                                    value="{{ $model->created_at->year }}" name="nam_khao_sat" style=" width: 10%;font-style:italic"
                                    placeholder="........"></div>
                            <h4 class="tieu_de" style="margin-left: 70px;">
                                PHIẾU
                                KHẢO SÁT ỨNG VIÊN</h4>
                            <i>(Đối tượng áp dụng: Nhân viên điều dưỡng,KTV,Dược sỹ)</i>
                            <p style="font-weight: 600;"> Vị trí ứng tuyển: <input class="input"
                                    value="{{ $model->vi_tri_ung_tuyen }}" name="vi_tri_ung_tuyen" required
                                    style="width: 40%;"
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
                            <p>Công ty đề nghị ứng viên trả lời 1 số câu hỏi khảo sát sau:</p>
                            <div>
                                <p style="display: inline;">Họ và tên ứng viên:</p> <input class="input" name="ho_ten"
                                    style="width: 35%;" value="{{ $model->ho_ten }}"
                                    placeholder=".......................................................................................">
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
                                <p style="display: inline;">Trường đào tạo:</p> <input class="input"
                                    value="{{ Arr::get($chiTietUngVien, 'truong_dao_tao', '') }}"
                                    name="truong_dao_tao" style="width:60%"
                                    placeholder="..........................................................................................................................................">
                                <br>
                                <p style="display: inline;">Chuyên ngành đào tạo:</p> <input class="input"
                                    value="{{ Arr::get($chiTietUngVien, 'chuyen_nganh_dao_tao', '') }}"
                                    name="chuyen_nganh_dao_tao" style="width: 25%;"
                                    placeholder="......................................................................">
                                Hệ
                                đào
                                tạo:
                                <input class="input" name="he_dao_tao" style="width: 25%;"
                                    value="{{ Arr::get($chiTietUngVien, 'he_dao_tao', '') }}"
                                    placeholder="..........................................................................."><br>
                                <p style="display: inline;">Địa chỉ:</p> <input class="input" name="dia_chi"
                                    value="{{ $model->dia_chi }}" style="width: 60%;"
                                    placeholder="......................................................................................................................................................."><br>
                                <p style="display: inline;">Điện thoại:</p> <input class="input" name="dien_thoai"
                                    value="{{ $model->dien_thoai }}" style="width: 25%;"
                                    placeholder="......................................................................">
                                Email:
                                <input class="input" name="email" type="email" style="width: 35%;" required
                                    value="{{ $model->email }}"
                                    placeholder="...................................................................................................."><br>
                                <p style="display: inline;">Chiều cao:</p> <input class="input" name="chieu_cao"
                                    value="{{ Arr::get($chiTietUngVien, 'chieu_cao', '') }}" style=" width: 25%;"
                                    placeholder="......................................................................">
                                Cân nặng:
                                <input class="input" name="can_nang" style="width: 30%;" required
                                    value="{{ Arr::get($chiTietUngVien, 'can_nang', '') }}"
                                    placeholder="........................................................."><br>
                                <p style="display: inline;">Tình trạng hôn nhân: </p>
                                <input type="radio" name="hon_nhan" value="Độc thân"> Độc thân
                                <input type="radio" name="hon_nhan" value="Đã có gia đình"> Đã có gia đình
                                <p style="display: inline; margin-left: 100px;">Số con: </p> <input class="input"
                                    value="{{ Arr::get($chiTietUngVien, 'so_con', '') }}" name="so_con"
                                    style="width: 20%;"
                                    placeholder="......................................................................"><br>
                                <p style="display: inline;">Tình trạng Chứng chỉ hành nghề: </p>
                                <input type="radio" name="chung_chi_hanh_nghe" value="Đã có"> Đã có
                                <input type="radio" name="chung_chi_hanh_nghe" value="Chưa có"> Chưa có
                                <br>
                                <p style="display: inline;">Các chứng chỉ đào tạo khác:</p> <input class="input"
                                    value="{{ Arr::get($chiTietUngVien, 'chung_chi_khac', '') }}"
                                    name="chung_chi_khac" style="width: 60%;"
                                    placeholder="...........................................................................................................................">
                            </div> <br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <p style="font-weight: 600; display: inline;"> 1.Quá trình công tác:</p> <i>(Dành
                                cho
                                những người đã có kinh nghiệm công tác)</i> <br>
                            <div class="table-responsive-md">
                                <table class="table table-bordered" style="width: 800px;">
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
                            </div>
                            <br>
                            <p style="font-weight: 600; display: inline;"> 2.Anh(chị) có khả năng(Thời gian,
                                kinh tế,
                                ...) để tiếp tục học các lớp nâng cao nghiệp vụ không?</p><br>
                            <input type="radio" name="hoc_lop_nang_cao" value="Có"> a.
                            Có
                            <input type="radio" name="hoc_lop_nang_cao" value="Không"
                                style="margin-left: 180px;"> b.
                            Không
                            <br> <br>
                            <p style="font-weight: 600; display: inline;"> 3.Anh(chị) có nguyện vọng ứng tuyển
                                vào
                                khoa nào tại Công ty? (*)</p><br>
                            <i>- Đánh số theo thứ tự ưu tiên (1,2,3); Một người được ứng tuyển 3 vị
                                trí.</i>
                            <div class="row">
                                <div class="col-3">
                                    <input type="checkbox" name="ung_tuyen[]" value="Khám bệnh cấp cứu"
                                        max="3"> <label for="Khám bệnh cấp cứu">Khám bệnh cấp cứu</label> <br>

                                    <input type="checkbox" name="ung_tuyen[]" value="Trung tâm oxi cao áp"
                                        max="3">
                                    <label for="Trung tâm oxi cao áp">Trung tâm oxi cao áp</label><br>

                                    <input type="checkbox" name="ung_tuyen[]" value="PHCN Tổng hợp" max="3">
                                    <label for="PHCN Tổng hợp">PHCN Tổng hợp</label><br>

                                    <input type="checkbox" name="ung_tuyen[]" value="XN" max="3">
                                    <label for="XN">XN</label> <br>

                                    <input type="checkbox" name="ung_tuyen[]" value="Phòng KHTH" max="3">
                                    <label for="Phòng KHTH">Phòng KHTH</label>
                                </div>
                                <div class="col-3">
                                    <input type="checkbox" name="ung_tuyen[]" value="YHCT" max="3">
                                    <label for="YHCT">YHCT</label><br>

                                    <input type="checkbox" name="ung_tuyen[]" value="PHCN sau đột quỵ"
                                        max="3">
                                    <label for="PHCN sau đột quỵ">PHCN sau đột quỵ</label> <br>

                                    <input type="checkbox" name="ung_tuyen[]" value="PHCN Nhi" max="3">
                                    <label for="PHCN Nhi">PHCN Nhi</label> <br>

                                    <input type="checkbox" name="ung_tuyen[]" value="CĐHA-TDCN" max="3">
                                    <label for="CĐHA-TDCN ">CĐHA-TDCN </label><br>

                                    <input type="checkbox" name="ung_tuyen[]" value="Phòng QLCL" max="3">
                                    <label for="Phòng QLCL">Phòng QLCL</label>
                                </div>
                                <div class="col-3">
                                    <input type="checkbox" name="ung_tuyen[]" value="Lão Khoa" max="3">
                                    <label for="Lão Khoa">Lão Khoa</label> <br>

                                    <input type="checkbox" name="ung_tuyen[]" value="PHCN sau chấn thương"
                                        max="3"> <label for="PHCN sau chấn thương">PHCN sau chấn
                                        thương</label><br>

                                    <input type="checkbox" name="ung_tuyen[]" value="PHCN ung thư" max="3">
                                    <label for="PHCN ung thư ">PHCN ung thư </label><br>

                                    <input type="checkbox" name="ung_tuyen[]" value="Dược" max="3">
                                    <label for="Dược">Dược</label> <br>

                                    <input type="checkbox" name="ung_tuyen[]" value="Phòng điều dưỡng"
                                        max="3">
                                    <label for="Phòng điều dưỡng">Phòng điều dưỡng</label> <br>
                                </div>
                                <div class="col-3">
                                    <input type="checkbox" name="ung_tuyen[]" value="Cơ xương khớp" max="3">
                                    <label for="Cơ xương khớp ">Cơ xương khớp </label><br>

                                    <input type="checkbox" name="ung_tuyen[]" value="PHCN hô hấp tim mạch"
                                        max="3">
                                    <label for="PHCN hô hấp tim mạch">PHCN hô hấp tim mạch</label><br>

                                    <input type="checkbox" name="ung_tuyen[]" value="KSNK" max="3">
                                    <label for="KSNK">KSNK</label> <br>

                                    <input type="checkbox" name="ung_tuyen[]" value="Khác" max="3"> <label
                                        for="Khác ">Khác </label>
                                </div>
                            </div> <br>

                            <p style="font-weight: 600; display: inline;"> 4.Anh(chị) biết thông tin tuyển dụng
                                của
                                Công ty qua kênh nào?</p><br>
                            <div class="row">
                                <div class="col-4">
                                    <input type="checkbox" name="nguon_tuyen_dung[]" value="Người thân giới thiệu">
                                    <label for="Người thân giới thiệu">Người thân giới thiệu</label> <br>

                                    <input type="checkbox" name="nguon_tuyen_dung[]" value="Facebook"> 
                                    <label for="Facebook">Facebook</label>
                                </div>
                                <div class="col-5">
                                    <input type="checkbox" name="nguon_tuyen_dung[]" value="Web/fanpage Công ty">
                                    <label for="Web/fanpage Công ty">Web/fanpage Công ty</label> <br>

                                    <input type="checkbox" name="nguon_tuyen_dung[]" value="Vietnamwork"> 
                                    <label for="Vietnamwork">Vietnamwork</label>
                                </div>
                                <div class="col-3">
                                    <input type="checkbox" name="nguon_tuyen_dung[]" value="Báo chí/ Truyền hình">
                                    <label for="Báo chí/Truyền hình ">Báo chí/Truyền hình </label><br>
                                    
                                    <input type="checkbox" name="nguon_tuyen_dung[]" value="Nguồn khác"> 
                                    <label for="Nguồn khác">Nguồn khác</label>
                                </div>
                            </div> <br>
                            <p style="font-weight: 600; display: inline;"> 6.Điểm yếu?</p><br>
                            <textarea name="diem_yeu" style=" width: 80%;" cols="30" rows="10">{{ Arr::get($chiTietUngVien, 'diem_yeu', '') }}</textarea> <br> <br>
                            <p style="font-weight: 600; display: inline;"> 7.Điểm mạnh?</p><br>
                            <textarea name="diem_manh" style=" width: 80%;" cols="30" rows="10">{{ Arr::get($chiTietUngVien, 'diem_manh', '') }}</textarea> <br> <br>
                            <p style="font-weight: 600; display: inline;"> 8.Mức lương mong muốn của anh(chị)
                                khi
                                vào làm việc tại công ty?</p><br>
                            <textarea required name="luong_mong_muon" style="width: 80%;" cols="30" rows="10" value="">{{ Arr::get($chiTietUngVien, 'luong_mong_muon', '') }}</textarea> <br> <br>
                            <p style="font-weight: 600; display: inline;"> 9.Anh(chị) có kiến nghị, đề xuất hoặc
                                thắc mắc muốn Công ty giải đáp không?</p><br>
                            <textarea name="de_xuat" style=" width: 80%;" cols="30" rows="10" name="content" value="">{{ Arr::get($chiTietUngVien, 'de_xuat', '') }}</textarea>
                        </div>
                    </div>

                    <br>
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
                <input type="hidden" name="loai_ung_vien"
                    value="{{ \App\Modules\Nhansu\src\Models\UngVien::LOAI_UNG_VIEN_DUOC_SI }}">
            </form>
        </div>
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
        $('#ksDSForm :input').prop("readonly", true);
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

        let chungChiHanhNghe = @json($chungChiHanhNghe);
        $("input[type=radio][name=chung_chi_hanh_nghe]").each(function() {
            let val = $(this).val()
            if (chungChiHanhNghe === val) {
                $(this).attr('checked', true)
            }
        });
    })
</script>
