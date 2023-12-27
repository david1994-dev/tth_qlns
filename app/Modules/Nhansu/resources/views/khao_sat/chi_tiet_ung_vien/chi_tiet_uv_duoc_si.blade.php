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
    <div class="container-fluid ">
        <form id="ksDSForm" action="" method="post"
              class="w-75 border border-2 border-success p-5 rounded" style="margin: auto;">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRK9A2qlhiiaIkO6qETm9ihfEy7AGvj3eAnH7fd-MQxqxouWOja2pxD9KE6JiLgn-gYOk&usqp=CAU"
                             alt="" width="100px" height="130px">
                    </div>
                    <div class="col-9 ">
                        <div style="text-align: right;"><i>Ngày</i><input type="number" class="input" value="{{$model->created_at->day}}"
                                                                          name="ngay_khao_sat" style="width: 40px;" placeholder="...."><i>Tháng</i><input
                                type="number" class="input" name="thang_khao_sat" style="width: 40px;" value="{{$model->created_at->month}}"
                                placeholder="...."><i>Năm</i><input type="number" class="input" value="{{$model->created_at->year}}"
                                                                    name="nam_khao_sat" style=" width: 70px;" placeholder="........"></div>
                        <h4 class="tieu_de" style="margin-left: 70px;">
                            PHIẾU
                            KHẢO SÁT ỨNG VIÊN</h4>
                        <i style="margin-left: 70px;">(Đối tượng áp dụng: Nhân viên điều dưỡng,KTV,Dược sỹ)</i>
                        <p style="margin-left: 70px;font-weight: 600;"> Vị trí ứng tuyển: <input class="input" value="{{$model->vi_tri_ung_tuyen}}"
                                                                                                 name="vi_tri_ung_tuyen" style="width: 300px;"
                                                                                                 placeholder="................................................................................................................................................">
                    </div>
                </div>
            </div>
            <br>
            <p style="margin-left: 220px;">Để phục vụ cho công tác tuyển dụng cán bộ-nhân viên vào làm việc tại Công
                ty
                và các chi nhánh</p>
            <p style="margin-left: 220px;">Công ty đề nghị ứng viên trả lời 1 số câu hỏi khảo sát sau:</p>
            <div style="margin-left: 220px;">
                <p style="display: inline;">Họ và tên ứng viên:</p> <input class="input" name="ho_ten" value="{{$model->ho_ten}}"
                                                                           style="width: 300px;"
                                                                           placeholder=".......................................................................................">
                <div style="text-align: right; display: inline;">
                    <p style="display: inline;">Sinh ngày</p><input type="number" class="input" value="{{$model->ngay_sinh->day}}"
                                                                    style="width: 40px;" name="ngay_sinh" placeholder="........">
                    <p style="display: inline;">Tháng</p><input type="number" class="input" style="width: 40px;" value="{{$model->ngay_sinh->month}}"
                                                                name="thang_sinh" placeholder="........">
                    <p style="display: inline;">Năm</p><input type="number" class="input" style="width: 60px;" value="{{$model->ngay_sinh->year}}"
                                                              name="nam_sinh" placeholder=".............">
                </div> <br>
                <p style="display: inline;">Trường đào tạo:</p> <input class="input" name="truong_dao_tao"
                                                                       value="{{Arr::get($chiTietUngVien, 'truong_dao_tao', '')}}"
                                                                       style="width: 546px;"
                                                                       placeholder="..........................................................................................................................................">
                <br>
                <p style="display: inline;">Chuyên ngành đào tạo:</p> <input class="input"
                                                                             value="{{Arr::get($chiTietUngVien, 'chuyen_nganh_dao_tao', '')}}"
                                                                             name="chuyen_nganh_dao_tao" style="width: 300px;"
                                                                             placeholder="......................................................................"> Hệ đào
                tạo:
                <input class="input" name="he_dao_tao" style="width: 115px;"
                       value="{{Arr::get($chiTietUngVien, 'he_dao_tao', '')}}"
                       placeholder="..................................."><br>
                <p style="display: inline;">Địa chỉ:</p> <input class="input" name="dia_chi"
                                                                value="{{$model->dia_chi}}"
                                                                style="width: 602px;"
                                                                placeholder="......................................................................................................................................................."><br>
                <p style="display: inline;">Điện thoại:</p> <input class="input" name="dien_thoai"
                                                                   value="{{$model->dien_thoai}}"
                                                                   style="width: 300px;"
                                                                   placeholder="......................................................................"> Email:
                <input class="input" name="email" type="email" style="width: 232px;" value="{{$model->email}}"
                       placeholder="................................................................."><br>
                <p style="display: inline;">Chiều cao:</p> <input class="input" name="chieu_cao"
                                                                  value="{{Arr::get($chiTietUngVien, 'chieu_cao', '')}}"
                                                                  style=" width: 300px;"
                                                                  placeholder="......................................................................"> Cân nặng:
                <input class="input" name="can_nang" style="width: 210px;"
                       value="{{Arr::get($chiTietUngVien, 'can_nang', '')}}"
                       placeholder="........................................................."><br>
                <p style="display: inline;">Tình trạng hôn nhân: </p>
                <input type="radio" name="hon_nhan" value="Độc thân"> Độc thân
                <input type="radio" name="hon_nhan" value="Đã có gia đình"> Đã có gia đình
                <p style="display: inline; margin-left: 100px;">Số con: </p> <input class="input" name="so_con"
                                                                                    value="{{Arr::get($chiTietUngVien, 'so_con', '')}}"
                                                                                    style="width: 168px;"
                                                                                    placeholder="......................................................................"><br>
                <p style="display: inline;">Tình trạng Chứng chỉ hành nghề: </p>
                <input type="radio" name="chung_chi_hanh_nghe" value="Đã có"> Đã có
                <input type="radio" name="chung_chi_hanh_nghe" value="Chưa có"> Chưa có
                <br>
                <p style="display: inline;">Các chứng chỉ đào tạo khác:</p> <input class="input"
                                                                                   name="chung_chi_khac" style="width: 470px;"
                                                                                   value="{{Arr::get($chiTietUngVien, 'chung_chi_khac', '')}}"
                                                                                   placeholder="...........................................................................................................................">
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
                @foreach($quaTrinhLamViec as $date => $value)
                    <tr>
                        <td style="width: 100px; height: 50px; "><input name="thoi_gian_lam_viec[]" class="input" value="{{$date}}">
                        </td>
                        @foreach($value as $cty => $viTri)
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
                kinh tế,
                ...) để tiếp tục học các lớp nâng cao nghiệp vụ không?</p><br>
            <input type="radio" name="hoc_lop_nang_cao" value="Có" style="margin-left: 180px;"> a. Có
            <input type="radio" name="hoc_lop_nang_cao" value="Không" style="margin-left: 180px;"> b. Không
            <br> <br>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 3.Anh(chị) có nguyện vọng ứng tuyển
                vào
                khoa nào tại Công ty? (*)</p><br>
            <i style="margin-left: 220px;">- Đánh số theo thứ tự ưu tiên (1,2,3); Một người được ứng tuyển 3 vị
                trí.</i>
            <div>
                <div>
                    <input type="checkbox" name="ung_tuyen[]" value="Nội khoa"style="margin-left: 180px;"
                           max="3">
                    Nội khoa
                    <input type="checkbox" name="ung_tuyen[]" value="Sản phụ khoa" style="margin-left: 50px;"
                           max="3"> Sản phụ khoa
                    <input type="checkbox" name="ung_tuyen[]" value="Xét nghiệm" style="margin-left: 50px;"
                           max="3"> Xét nghiệm
                    <input type="checkbox" name="ung_tuyen[]" value="Răng hàm mặt" style="margin-left: 196px;"
                           max="3"> Răng hàm mặt
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen[]" value="Ngoại khoa" style="margin-left: 180px;"
                           max="3"> Ngoại khoa
                    <input type="checkbox" name="ung_tuyen[]" value="Nhi khoa" style="margin-left: 35px;"
                           max="3">
                    Nhi khoa
                    <input type="checkbox" name="ung_tuyen[]" value="Chẩn đoán hình ảnh- thăm dò CN"
                           style="margin-left: 82px;" max="3"> Chẩn đoán hình ảnh- thăm dò CN
                    <input type="checkbox" name="ung_tuyen[]" value="Tai mũi họng" style="margin-left: 50px;"
                           max="3"> Tai mũi họng
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen[]" value="Mắt" style="margin-left: 180px;"
                           max="3">
                    Mắt
                    <input type="checkbox" name="ung_tuyen[]" value="U bước-Y học hạt nhân"
                           style="margin-left: 85px;" max="3"> U bước-Y học hạt nhân
                    <input type="checkbox" name="ung_tuyen[]" value="dinh dưỡng" style="margin-left: 82px;"
                           max="3"> dinh dưỡng
                    <input type="checkbox" name="ung_tuyen[]" value="Chuyên viên kế hoạch tổng hợp"
                           style="margin-left: 50px;" max="3"> Chuyên viên kế hoạch tổng hợp
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen[]" value="YHCT" style="margin-left: 180px;"
                           max="3">
                    YHCT
                    <input type="checkbox" name="ung_tuyen[]" value="Hồi sức cấp cứu" style="margin-left: 75px;"
                           max="3"> Hồi sức cấp cứu
                    <input type="checkbox" name="ung_tuyen[]" value="Thẩm mỹ - da liễu"
                           style="margin-left: 38px;" max="3"> Thẩm mỹ - da liễu
                    <input type="checkbox" name="ung_tuyen[]" value="Gây mê - Phẫu thuật"
                           style="margin-left: 152px;" max="3"> Gây mê - Phẫu thuật
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen[]" value="Kiểm soát chất lượng BV"
                           style="margin-left: 180px;" max="3">
                    Kiểm soát chất lượng BV
                </div>
            </div> <br>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 4.Anh(chị) mong muốn công tác tại
                bệnh
                viện nào của công ty?</p><br>
            <div>
                <input type="checkbox" name="don_vi_ung_tuyen[]"
                       value="BV RHM và PTTHTM Thái Thượng Hoàng"style="margin-left: 180px;"> a.BV RHM và PTTHTM Thái
                Thượng Hoàng
                <input type="checkbox" name="don_vi_ung_tuyen[]" value="Bệnh viện Đa khoa TTH Đức Thọ"
                       style="margin-left: 50px;">
                e.Bệnh viện Đa khoa TTH Đức Thọ
            </div>
            <div>
                <input type="checkbox" name="don_vi_ung_tuyen[]"
                       value="Bệnh viện Đa khoa TTH Vinh"style="margin-left: 180px;"> b.Bệnh viện Đa khoa TTH Vinh
                <input type="checkbox" name="don_vi_ung_tuyen[]" value="Bệnh viện Đa khoa TTH Quảng Bình"
                       style="margin-left: 126px;">
                f.Bệnh viện Đa khoa TTH Quảng Bình
            </div>
            <div>
                <input type="checkbox" name="don_vi_ung_tuyen[]"
                       value="Bệnh viện Đa khoa TTH Hưng Đông"style="margin-left: 180px;">
                c.Bệnh viện Đa khoa TTH Hưng Đông
                <input type="checkbox" name="don_vi_ung_tuyen[]" value="Bệnh viện Đa khoa TTH Quảng Trị"
                       style="margin-left: 82px;">
                h.Bệnh viện Đa khoa TTH Quảng Trị
            </div>
            <div>
                <input type="checkbox" name="don_vi_ung_tuyen[]"
                       value="Bệnh viện Đa khoa TTH Hà Tĩnh"style="margin-left: 180px;">
                d.Bệnh viện Đa khoa TTH Hà Tĩnh
            </div> <br>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 5.Anh(chị) biết thông tin tuyển dụng
                của
                Công ty qua kênh nào?</p><br>
            <div>
                <input type="checkbox" name="nguon_tuyen_dung[]" value="Người thân giới thiệu"
                       style="margin-left: 180px;">
                Người thân giới thiệu
                <input type="checkbox" name="nguon_tuyen_dung[]" value="Facebook"
                       style="margin-left: 85px;"> Facebook
                <input type="checkbox" name="nguon_tuyen_dung[]" value="Báo chí/ Truyền hình"
                       style="margin-left: 82px;"> Báo chí/ Truyền hình
            </div>
            <div>
                <input type="checkbox" name="nguon_tuyen_dung[]" value="Web/fanpage Công ty"
                       style="margin-left: 180px;"> Web/fanpage Công ty
                <input type="checkbox" name="nguon_tuyen_dung[]" value="Vietnamwork"
                       style="margin-left: 82px;"> Vietnamwork
                <input type="checkbox" name="nguon_tuyen_dung[]" value="Nguồn khác"
                       style="margin-left: 57px;"> Nguồn khác
            </div> <br>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 6.Điểm yếu?</p><br>
            <textarea name="diem_yeu" style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10">
                {{Arr::get($chiTietUngVien, 'diem_yeu', '')}}
            </textarea> <br> <br>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 7.Điểm mạnh?</p><br>
            <textarea name="diem_manh" style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10">
                {{Arr::get($chiTietUngVien, 'diem_manh', '')}}
            </textarea> <br> <br>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 8.Mức lương mong muốn của anh(chị)
                khi
                vào làm việc tại công ty?</p><br>
            <textarea name="luong_mong_muon" style="margin-left: 180px; width: 800px; height: 100px;" cols="30"
                      rows="10">
                {{Arr::get($chiTietUngVien, 'luong_mong_muon', '')}}
            </textarea> <br> <br>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 9.Anh(chị) có kiến nghị, đề xuất hoặc
                thắc mắc muốn Công ty giải đáp không?</p><br>
            <textarea name="de_xuat" style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10"
                      name="content">
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
                        <i style="margin-left: 175px;">(Ký,ghi rõ họ tên)</i> <br> <br>
                        <div style="margin-left: 190px;">
                            {{$model->ho_ten}} <br>
                            <small>{{$model->ngay_ky->format('d-m-Y H:i:s')}}</small>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="loai_ung_vien"
                   value="{{ \App\Modules\Nhansu\src\Models\UngVien::LOAI_UNG_VIEN_DUOC_SI }}">
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
<script>
    $(document).ready(function() {
        $('#ksDSForm :input').prop("readonly", true);
        $("input[type=checkbox]").click(function () {
            return false;
        });
        $("input[type=radio]").click(function () {
            return false;
        });

        let ungTuyen = @json($ungTuyen);
        $("input[type=checkbox][name=ung_tuyen\\[\\]]").each(function () {
            let val = $(this).val()
            if (ungTuyen.includes(val)) {
                $( this ).attr( 'checked', true )
            }
        });

        let hinhThucDaoTao = @json($hinhThucDaoTao);
        $("input[type=checkbox][name=hinh_thuc_dao_tao\\[\\]]").each(function () {
            let val = $(this).val()
            if (hinhThucDaoTao.includes(val)) {
                $( this ).attr( 'checked', true )
            }
        });

        let vanBang = @json($vanBang);
        $("input[type=checkbox][name=van_bang\\[\\]]").each(function () {
            let val = $(this).val()
            if (vanBang.includes(val)) {
                $( this ).attr( 'checked', true )
            }
        });

        let donVi = @json($donViUngTuyen);
        $("input[type=checkbox][name=don_vi_ung_tuyen\\[\\]]").each(function () {
            let val = $(this).val()
            if (donVi.includes(val)) {
                $( this ).attr( 'checked', true )
            }
        });

        let nguonTuyenDung = @json($nguonTuyenDung);
        $("input[type=checkbox][name=nguon_tuyen_dung\\[\\]]").each(function () {
            let val = $(this).val()
            if (nguonTuyenDung.includes(val)) {
                $( this ).attr( 'checked', true )
            }
        });

        let thoiHanHopDong = @json($thoiHanHopDong);
        $("input[type=radio][name=thoi_han_hop_dong]").each(function () {
            let val = $(this).val()
            if (thoiHanHopDong === val) {
                $( this ).attr( 'checked', true )
            }
        });

        let loaiTotNghiep = @json($loaiTotNghiep);
        $("input[type=radio][name=loai_tot_nghiep]").each(function () {
            let val = $(this).val()
            if (loaiTotNghiep === val) {
                $( this ).attr( 'checked', true )
            }
        });

        let trinhDo = @json($trinhDo);
        $("input[type=radio][name=trinh_do]").each(function () {
            let val = $(this).val()
            if (trinhDo === val) {
                $( this ).attr( 'checked', true )
            }
        });

        let loaiHinhDaoTao = @json($loaiHinhDaoTao);
        $("input[type=radio][name=loai_hinh_dao_tao]").each(function () {
            let val = $(this).val()
            if (loaiHinhDaoTao === val) {
                $( this ).attr( 'checked', true )
            }
        });

        let honNhan = @json($honNhan);
        $("input[type=radio][name=hon_nhan]").each(function () {
            let val = $(this).val()
            if (honNhan === val) {
                $( this ).attr( 'checked', true )
            }
        });

        let lopHocNangCao = @json($lopHocNangCao);
        $("input[type=radio][name=hoc_lop_nang_cao]").each(function () {
            let val = $(this).val()
            if (lopHocNangCao === val) {
                $( this ).attr( 'checked', true )
            }
        });

        let chungChiHanhNghe = @json($chungChiHanhNghe);
        $("input[type=radio][name=chung_chi_hanh_nghe]").each(function () {
            let val = $(this).val()
            if (chungChiHanhNghe === val) {
                $( this ).attr( 'checked', true )
            }
        });
    })
</script>
