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
            <form id="ksDSForm" action="{{ route('taoUngVien') }}" method="post"
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
                            <i style="margin-left: 70px;">(Đối tượng áp dụng: Nhân viên điều dưỡng,KTV,Dược sỹ)</i>
                            <p style="margin-left: 70px;font-weight: 600;"> Vị trí ứng tuyển: <input class="input"
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
                    <p style="display: inline;">Họ và tên ứng viên:</p> <input class="input" name="ho_ten"
                        style="width: 300px;"
                        placeholder="......................................................................"> Ngày sinh:
                    <input class="input" name="ngay_sinh" style=" width: 150px;"
                        placeholder="..................................."> <br>
                    <p style="display: inline;">Trường đào tạo:</p> <input class="input" name="truong_dao_tao"
                        style="width: 546px;"
                        placeholder="..........................................................................................................................................">
                    <br>
                    <p style="display: inline;">Chuyên ngành đào tạo:</p> <input class="input"
                        name="chuyen_nganh_dao_tao" style="width: 300px;"
                        placeholder="......................................................................"> Hệ đào
                    tạo:
                    <input class="input" name="he_dao_tao" style="width: 115px;"
                        placeholder="..................................."><br>
                    <p style="display: inline;">Địa chỉ:</p> <input class="input" name="dia_chi" style="width: 602px;"
                        placeholder="......................................................................................................................................................."><br>
                    <p style="display: inline;">Điện thoại:</p> <input class="input" name="dien_thoai"
                        style="width: 300px;"
                        placeholder="......................................................................"> Email:
                    <input class="input" name="email" type="email" style="width: 232px;"
                        placeholder="................................................................."><br>
                    <p style="display: inline;">Chiều cao:</p> <input class="input" name="chieu_cao"
                        style=" width: 300px;"
                        placeholder="......................................................................"> Cân nặng:
                    <input class="input" name="can_nang" style="width: 210px;"
                        placeholder="........................................................."><br>
                    <p style="display: inline;">Tình trạng hôn nhân: </p>
                    <input type="radio" name="hon_nhan" value="Độc thân"> Độc thân
                    <input type="radio" name="hon_nhan" value="Đã có gia đình"> Đã có gia đình
                    <p style="display: inline; margin-left: 100px;">Số con: </p> <input class="input" name="so_con"
                        style="width: 168px;"
                        placeholder="......................................................................"><br>
                    <p style="display: inline;">Tình trạng Chứng chỉ hành nghề: </p>
                    <input type="radio" name="chung_chi_hanh_nghe" value="Đã có"> Đã có
                    <input type="radio" name="chung_chi_hanh_nghe" value="Chưa có"> Chưa có
                    <br>
                    <p style="display: inline;">Các chứng chỉ đào tạo khác:</p> <input class="input"
                        name="chung_chi_khac" style="width: 470px;"
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
                        <tr>
                            <td style="width: 100px; height: 50px; "><input name="thoi_gian_lam_viec[]"
                                    class="input"></td>
                            <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]" class="input"
                                    style="width: 280px"></td>
                            <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]" class="input"
                                    style="width: 280px"></td>
                        </tr>
                        <tr>
                            <td style="width: 100px; height: 50px; "><input class="input" name="thoi_gian_lam_viec[]"></td>
                            <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]" class="input"
                                    style="width: 280px"></td>
                            <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]"  class="input" style="width: 280px"></td>
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
                    <input type="checkbox" name="thong_tin_tuyen_dung[]" value="Người thân giới thiệu"
                        style="margin-left: 180px;">
                    Người thân giới thiệu
                    <input type="checkbox" name="thong_tin_tuyen_dung[]" value="Facebook"
                        style="margin-left: 85px;"> Facebook
                    <input type="checkbox" name="thong_tin_tuyen_dung[]" value="Báo chí/ Truyền hình"
                        style="margin-left: 82px;"> Báo chí/ Truyền hình
                </div>
                <div>
                    <input type="checkbox" name="thong_tin_tuyen_dung[]" value="Web/fanpage Công ty"
                        style="margin-left: 180px;"> Web/fanpage Công ty
                    <input type="checkbox" name="thong_tin_tuyen_dung[]" value="Vietnamwork"
                        style="margin-left: 82px;"> Vietnamwork
                    <input type="checkbox" name="thong_tin_tuyen_dung[]" value="Nguồn khác"
                        style="margin-left: 57px;"> Nguồn khác
                </div> <br>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 6.Điểm yếu?</p><br>
                <textarea name="diem_yeu" style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10"
                ></textarea> <br> <br>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 7.Điểm mạnh?</p><br>
                <textarea name="diem_manh" style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10"
                ></textarea> <br> <br>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 8.Mức lương mong muốn của anh(chị)
                    khi
                    vào làm việc tại công ty?</p><br> 
                <textarea name="luong_mong_muon" style="margin-left: 180px; width: 800px; height: 100px;" cols="30"
                    rows="10" ></textarea> <br>  <br>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 9.Anh(chị) có kiến nghị, đề xuất hoặc
                    thắc mắc muốn Công ty giải đáp không?</p><br>
                <textarea name="de_xuat" style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10"
                    name="content"></textarea>
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
                            <button type="submit" class="btn btn-primary" style="margin-left: 190px">--Ký
                                tên--</button>
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

        let form = $('#ksDSForm')
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
