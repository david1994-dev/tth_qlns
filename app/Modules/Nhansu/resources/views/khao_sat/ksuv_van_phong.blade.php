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
            <form id="ksVPForm" action="{{ route('taoUngVien') }}" method="post"
                class="w-75 border border-2 border-success p-5 rounded" style="margin: auto;">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRK9A2qlhiiaIkO6qETm9ihfEy7AGvj3eAnH7fd-MQxqxouWOja2pxD9KE6JiLgn-gYOk&usqp=CAU"
                                alt="" width="100px" height="130px">
                        </div>
                        <div class="col-9 ">
                            <div style="text-align: right;"><i>Ngày</i><input type="number" class="input"
                                    name="ngay_khao_sat" style="width: 40px;" placeholder="...."><i>Tháng</i><input
                                    type="number" class="input" name="thang_khao_sat" style="width: 40px;"
                                    placeholder="...."><i>Năm</i><input type="number" class="input"
                                    name="nam_khao_sat" style=" width: 70px;" placeholder="........"></div>
                            <h4 class="tieu_de" style="margin-left: 70px;">
                                PHIẾU
                                KHẢO SÁT ỨNG VIÊN</h4>
                            <i style="margin-left: 70px;">(Đối tượng áp dụng: vị trí Văn phòng)</i>
                            <p style="margin-left: 70px;font-weight: 600;"> Vị trí ứng tuyển: <input
                                    name="vi_tri_ung_tuyen" class="input" style=" width: 300px;"
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
                        style="width: 350px;"
                        placeholder="..............................................................................................">
                    <div style="text-align: right; display: inline;">
                        <p style="display: inline;">Sinh ngày</p><input type="number" class="input"
                            style="width: 40px;" name="ngay_sinh" placeholder="........">
                        <p style="display: inline;">Tháng</p><input type="number" class="input" style="width: 40px;"
                            name="thang_sinh" placeholder="........">
                        <p style="display: inline;">Năm</p><input type="number" class="input" style="width: 60px;"
                            name="nam_sinh" placeholder=".............">
                    </div> <br>
                    <p style="display: inline;">Địa chỉ:</p> <input class="input" name="dia_chi" style="width: 602px;"
                        placeholder="......................................................................................................................................................."><br>
                    <p style="display: inline;">Điện thoại:</p> <input class="input" name="dien_thoai"
                        style="width: 300px;"
                        placeholder="......................................................................"> Email:
                    <input class="input" style=" width: 232px;" type="email" name="email"
                        placeholder="................................................................."><br>
                    <p style="display: inline;">Trường đào tạo:</p> <input class="input" style="width: 546px;"
                        name="truong_dao_tao"
                        placeholder="..........................................................................................................................................">
                    <br>
                    <p style="display: inline;">Chuyên ngành đào tạo:</p> <input class="input" style="width: 300px;"
                        name="chuyen_nganh_dao_tao"
                        placeholder="......................................................................"> Hệ đào
                    tạo:
                    <input name="he_dao_tao" class="input" style="width: 115px;"
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
                        style="width: 300px;"
                        placeholder="......................................................................"> Cân nặng:
                    <input name="can_nang" class="input" style="width: 210px;"
                        placeholder="........................................................."><br>
                    <p style="display: inline;">Tình trạng hôn nhân: </p>
                    <input type="radio" name="hon_nhan" value="Độc thân"> Độc thân
                    <input type="radio" name="hon_nhan" value="Đã có gia đình"> Đã có gia đình
                    <p style="display: inline; margin-left: 100px;">Số con: </p> <input class="input" name="so_con"
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
                        <tr>
                            <td style="width: 100px; height: 50px; "><input name="thoi_gian_lam_viec[]"
                                    class="input"></td>
                            <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]" class="input"
                                    style="width: 280px"></td>
                            <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]" class="input"
                                    style="width: 280px"></td>
                        </tr>
                        <tr>
                            <td style="width: 100px; height: 50px; "><input name="thoi_gian_lam_viec[]"
                                    class="input"></td>
                            <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]" class="input"
                                    style="width: 280px"></td>
                            <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]" class="input"
                                    style="width: 280px"></td>
                        </tr>
                        <tr>
                            <td style="width: 100px; height: 50px; "><input name="thoi_gian_lam_viec[]"
                                    class="input"></td>
                            <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]" class="input"
                                    style="width: 280px"></td>
                            <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]" class="input"
                                    style="width: 280px"></td>
                        </tr>
                        <tr>
                            <td style="width: 100px; height: 50px; "><input name="thoi_gian_lam_viec[]"
                                    class="input"></td>
                            <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]" class="input"
                                    style="width: 280px"></td>
                            <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]" class="input"
                                    style="width: 280px"></td>
                        </tr>
                        <tr>
                            <td style="width: 100px; height: 50px; "><input name="thoi_gian_lam_viec[]"
                                    class="input"></td>
                            <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]" class="input"
                                    style="width: 280px"></td>
                            <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]" class="input"
                                    style="width: 280px"></td>
                        </tr>
                        <tr>
                            <td style="width: 100px; height: 50px; "><input name="thoi_gian_lam_viec[]"
                                    class="input"></td>
                            <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]" class="input"
                                    style="width: 280px"></td>
                            <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]" class="input"
                                    style="width: 280px"></td>
                        </tr>
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
                        style="margin-left: 180px;"> Nhân viên kinh doanh
                    <input type="checkbox" name="ung_tuyen[]" value="NV Thiết kế" style="margin-left: 35px;"> NV
                    Thiết kế
                    <input type="checkbox" name="ung_tuyen[]" value="Nhân viên truyền thông"
                        style="margin-left: 50px;"> Nhân viên truyền thông
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen[]" value="Nhân viên hành chính"
                        style="margin-left: 180px;"> Nhân viên hành chính
                    <input type="checkbox" name="ung_tuyen[]" value="Nhân viên CSKH" style="margin-left: 36px;">
                    Nhân viên CSKH
                    <input type="checkbox" name="ung_tuyen[]" value="Nhân viên quản trị web"
                        style="margin-left: 17px;"> Nhân viên quản trị web
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen[]" value="NV Tư vấn PTTM" style="margin-left: 180px;"> NV
                    Tư vấn PTTM
                    <input type="checkbox" name="ung_tuyen[]" value="CV Nhân sự" style="margin-left: 72px;"> CV Nhân
                    sự
                    <input type="checkbox" name="ung_tuyen[]" value="NV Điện nước" style="margin-left: 50px;"> NV
                    Điện nước
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen[]" value="NV Thu ngân - Lễ tân"
                        style="margin-left: 180px;"> NV Thu ngân - Lễ tân
                    <input type="checkbox" name="ung_tuyen[]" value="NV Văn thư" style="margin-left: 39px;"> NV Văn
                    thư
                    <input type="checkbox" name="ung_tuyen[]" value="NV Kế hoạch" style="margin-left: 53px;"> NV Kế
                    hoạch
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen[]" value="NV Kế toán" style="margin-left: 180px;"> NV Kế
                    toán
                    <input type="checkbox" name="ung_tuyen[]" value="NV Lái xe" style="margin-left: 110px;"> NV Lái
                    xe
                    <input type="checkbox" name="ung_tuyen[]" value="NV Thiết kế phần" style="margin-left: 67px;">
                    NV Thiết kế phần
                    mềm
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen[]" value="NV Pháp chế" style="margin-left: 180px;"> NV
                    Pháp chế
                    <input type="checkbox" name="ung_tuyen[]" value="NV Bảo vệ" style="margin-left: 99px;"> NV Bảo
                    vệ
                    <input type="checkbox" name="ung_tuyen[]" value="NV Quản lý dự án" style="margin-left: 61px;">
                    NV Quản lý dự án
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen[]" value="Khác" style="margin-left: 180px;"> Khác
                    <input type="checkbox" name="ung_tuyen[]" value="NV IT" style="margin-left: 155px;"> NV IT
                    <input type="checkbox" name="ung_tuyen[]" value="NV Đối ngoại và quan hệ QT"
                        style="margin-left: 95px;"> NV Đối ngoại và quan hệ QT
                </div> <br>

                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 5.Điểm yếu?</p><br>
                <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="diem_yeu"></textarea> <br> <br>
                <p style="margin-left: 180px;font-weight: 600; display: inline;">
                    6.Điểm mạnh?</p><br>
                <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="diem_manh"></textarea> <br> <br>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 7.Mục tiêu ngắn hạn/dài hạn của
                    anh(chị)
                    là gì?</p><br>
                <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="muc_tieu"></textarea> <br> <br>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 8.Mức lương mong muốn của anh(chị)
                    khi
                    vào
                    làm việc tại công ty?</p><br>
                <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10"
                    name="luong_mong_muon"></textarea> <br> <br>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 9.Anh(chị) có kiến nghị, đề xuất hoặc
                    thắc
                    mắc muốn Công ty giải đáp không?</p><br>
                <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="de_xuat"></textarea>
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
                            <button type="submit" class="btn btn-primary" style="margin-left: 190px">--Ký
                                tên--</button>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="loai_ung_vien"
                    value="{{ \App\Modules\Nhansu\src\Models\UngVien::LOAI_UNG_VIEN_VAN_PHONG }}">
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
    const orderedCheckbox = [];
    $(document).ready(function() {

        let checkboxUngTuyen = $("input[type=checkbox][name=ung_tuyen\\[\\]]");
        checkboxUngTuyen.click(function() {
            let bol = $("input[type=checkbox][name=ung_tuyen\\[\\]]:checked").length >= 3;
            checkboxUngTuyen.not(":checked").attr("disabled", bol);
        });

        checkboxUngTuyen.on('click', function(e) {
            const value = $(this).val();
            const isChecked = $(this).is(':checked');
            const index = orderedCheckbox.findIndex(_value => _value === value);
            if (index >= 0 && !isChecked) {
                orderedCheckbox.splice(index, 1);
            }

            if (index < 0) {
                orderedCheckbox.push(value);
            }

        });

        let form = $('#ksVPForm')
        form.submit(event => {
            event.preventDefault();
            // remove all previous checkbox append
            $('.hidden_input_to_save').remove();

            // append field depends on ordered list
            orderedCheckbox.forEach((value, key) => {
                form.append(
                    `<input type="hidden" class="hidden_input_to_save" name="ung_tuyen[${key}]" value="${orderedCheckbox[key]}" />`
                )
            });

            event.currentTarget.submit();
        })
    })
</script>
