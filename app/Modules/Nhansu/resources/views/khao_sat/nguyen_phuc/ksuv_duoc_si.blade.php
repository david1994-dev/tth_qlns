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

        input[type="file"] {
            display: none;
        }

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
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="container-fluid">
        <div class="content">
            {{-- <div class="container-fluid "> --}}
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
            <form id="ksDSForm" action="{{ route('nhansu.taoUngVien') }}" method="post"
                class=" border border-2 border-success rounded" style="margin: auto;" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-5">
                            <img id="profile-image-preview"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRK9A2qlhiiaIkO6qETm9ihfEy7AGvj3eAnH7fd-MQxqxouWOja2pxD9KE6JiLgn-gYOk&usqp=CAU"
                                alt="" width="150px" height="130px">
                            <label for="profile-image" class="custom-file-upload text-center">
                                <i class="bi bi-upload"></i> Tải ảnh
                            </label>
                            <input id="profile-image" name="image" type="file" />
                        </div>
                        <div class="col-7 ">
                            <div style="text-align: right;"><i>Ngày</i><input type="number" class="input"
                                    value="{{ old('ngay_khao_sat') ?? '' }}" name="ngay_khao_sat" style="width: 5%;"
                                    placeholder="...."><i>Tháng</i><input type="number" class="input"
                                    name="thang_khao_sat" style="width: 5%;" value="{{ old('thang_khao_sat') ?? '' }}"
                                    placeholder="...."><i>Năm</i><input type="number" class="input"
                                    value="{{ old('nam_khao_sat') ?? '' }}" name="nam_khao_sat" style=" width: 10%;"
                                    placeholder="........"></div>
                            <h4 class="tieu_de">
                                PHIẾU
                                KHẢO SÁT ỨNG VIÊN</h4>
                            <i>(Đối tượng áp dụng: Nhân viên điều dưỡng,KTV,Dược sỹ)</i>
                            <p style="font-weight: 600;"> Vị trí ứng tuyển: <input class="input"
                                    value="{{ old('vi_tri_ung_tuyen') ?? '' }}" name="vi_tri_ung_tuyen" required
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <p style="display: inline;">Họ và tên ứng viên:</p> <input class="input"
                                            name="ho_ten" style="width: 60%;" value="{{ old('ho_ten') ?? '' }}"
                                            required
                                            placeholder=".......................................................................................">
                                    </div>
                                    <div style="display: inline;" class="col-md-6">
                                        <p style="display: inline;">Ngày sinh</p>
                                        <input type="date" id="ngay_sinh" name="ngay_sinh" required
                                            value="{{ old('ngay_sinh') ?? '' }}"
                                            style="width: 50% ;display: inline;  border-radius: 4px;
                                            border: 2px solid;
                                            border-color: #bcbcbc;">
                                    </div>
                                </div>
                                <p style="display: inline;">Trường đào tạo:</p> <input class="input"
                                    value="{{ old('truong_dao_tao') ?? '' }}" name="truong_dao_tao" style="width:60%"
                                    placeholder="..........................................................................................................................................">
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p style="display: inline;">Chuyên ngành đào tạo:</p> <input class="input"
                                            value="{{ old('chuyen_nganh_dao_tao') ?? '' }}"
                                            name="chuyen_nganh_dao_tao" style="width: 50%;"
                                            placeholder="......................................................................">
                                    </div>
                                    <div class="col-md-6">
                                        Hệ
                                        đào
                                        tạo:
                                        <input class="input" name="he_dao_tao" style="width: 50%;"
                                            value="{{ old('he_dao_tao') ?? '' }}"
                                            placeholder="...........................................................................">
                                    </div>
                                </div>
                                <p style="display: inline;">Địa chỉ:</p> <input class="input" name="dia_chi"
                                    value="{{ old('dia_chi') ?? '' }}" style="width: 60%;" required
                                    placeholder="......................................................................................................................................................."><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p style="display: inline;">Điện thoại:</p> <input class="input"
                                            name="dien_thoai" required value="{{ old('dien_thoai') ?? '' }}"
                                            style="width: 50%;"
                                            placeholder="......................................................................">
                                    </div>
                                    <div class="col-md-6">
                                        Email:
                                        <input class="input" style=" width: 70%;" type="email" name="email"
                                            required value="{{ old('email') ?? '' }}"
                                            placeholder=".................................................................">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <p style="display: inline;">Chiều cao:</p> <input name="chieu_cao"
                                            class="input" value="{{ old('chieu_cao') ?? '' }}" style="width: 50%;"
                                            required
                                            placeholder="......................................................................">
                                    </div>
                                    <div class="col-md-7">
                                        Cân nặng:
                                        <input name="can_nang" class="input" style="width: 40%;" class="input"
                                            value="{{ old('can_nang') ?? '' }}" required
                                            placeholder=".........................................................">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <p style="display: inline;">Tình trạng hôn nhân: </p>
                                        <input type="radio" name="hon_nhan" value="Độc thân"> Độc thân
                                        <input type="radio" name="hon_nhan" value="Đã có gia đình"> Đã có gia đình
                                    </div>
                                    <div class="col-md-5">
                                        <p style="display: inline;">
                                            Số con: </p> <input class="input" value="{{ old('so_con') ?? '' }}"
                                            name="so_con" style="width: 20%;"
                                            placeholder="......................................................................">
                                    </div>
                                </div>
                                <p style="display: inline;">Tình trạng Chứng chỉ hành nghề: </p>
                                <input type="radio" name="chung_chi_hanh_nghe" value="Đã có"> Đã có
                                <input type="radio" name="chung_chi_hanh_nghe" value="Chưa có"> Chưa có
                                <br>
                                <p style="display: inline;">Các chứng chỉ đào tạo khác:</p> <input class="input"
                                    value="{{ old('chung_chi_khac') ?? '' }}" name="chung_chi_khac"
                                    style="width: 40%;"
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
                                        <tr>
                                            <td style="width: 100px; height: 50px; "><input
                                                    name="thoi_gian_lam_viec[]" class="input"></td>
                                            <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]"
                                                    class="input" style="width: 280px">
                                            </td>
                                            <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]"
                                                    class="input" style="width: 280px">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 100px; height: 50px; "><input
                                                    name="thoi_gian_lam_viec[]" class="input"></td>
                                            <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]"
                                                    class="input" style="width: 280px">
                                            </td>
                                            <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]"
                                                    class="input" style="width: 280px">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 100px; height: 50px; "><input
                                                    name="thoi_gian_lam_viec[]" class="input"></td>
                                            <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]"
                                                    class="input" style="width: 280px">
                                            </td>
                                            <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]"
                                                    class="input" style="width: 280px">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 100px; height: 50px; "><input
                                                    name="thoi_gian_lam_viec[]" class="input"></td>
                                            <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]"
                                                    class="input" style="width: 280px">
                                            </td>
                                            <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]"
                                                    class="input" style="width: 280px">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 100px; height: 50px; "><input
                                                    name="thoi_gian_lam_viec[]" class="input"></td>
                                            <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]"
                                                    class="input" style="width: 280px">
                                            </td>
                                            <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]"
                                                    class="input" style="width: 280px">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 100px; height: 50px; "><input
                                                    name="thoi_gian_lam_viec[]" class="input"></td>
                                            <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]"
                                                    class="input" style="width: 280px">
                                            </td>
                                            <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]"
                                                    class="input" style="width: 280px">
                                            </td>
                                        </tr>
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
                            Không <br> <br>
                            <p style="font-weight: 600; display: inline;"> 3.Anh(chị) có nguyện vọng ứng tuyển
                                vào
                                khoa nào tại Công ty? (*)</p><br>
                            <i>- Đánh số theo thứ tự ưu tiên (1,2,3); Một người được ứng tuyển 3 vị
                                trí.</i>
                                <div class="row">
                                    <div class="col-3">
                                        <input type="checkbox" name="ung_tuyen[]" value="Khám bệnh cấp cứu"
                                            max="3"> Khám bệnh cấp cứu <br>
                                        <input type="checkbox" name="ung_tuyen[]" value="Trung tâm oxi cao áp"
                                            max="3">
                                        Trung tâm oxi cao áp<br>
                                        <input type="checkbox" name="ung_tuyen[]" value="PHCN Tổng hợp"
                                            max="3">
                                        PHCN Tổng hợp<br>
                                        <input type="checkbox" name="ung_tuyen[]" value="XN" max="3">
                                        XN <br>
                                        <input type="checkbox" name="ung_tuyen[]" value="Phòng KHTH" max="3">
                                        Phòng KHTH
                                    </div>
                                    <div class="col-3">
                                        <input type="checkbox" name="ung_tuyen[]" value="YHCT" max="3">
                                        YHCT<br>
                                        <input type="checkbox" name="ung_tuyen[]" value="PHCN sau đột quỵ"
                                            max="3">
                                        PHCN sau đột quỵ <br>
                                        <input type="checkbox" name="ung_tuyen[]" value="PHCN Nhi" max="3">
                                        PHCN Nhi <br>
                                        <input type="checkbox" name="ung_tuyen[]" value="CĐHA-TDCN" max="3">
                                        CĐHA-TDCN <br>
                                        <input type="checkbox" name="ung_tuyen[]" value="Phòng QLCL" max="3">
                                        Phòng QLCL
                                    </div>
                                    <div class="col-3">
                                        <input type="checkbox" name="ung_tuyen[]" value="Lão Khoa" max="3">
                                        Lão Khoa <br>
                                        <input type="checkbox" name="ung_tuyen[]" value="PHCN sau chấn thương"
                                            max="3"> PHCN sau chấn thương<br>
                                        <input type="checkbox" name="ung_tuyen[]" value="PHCN ung thư"
                                            max="3">
                                        PHCN ung thư <br>
                                        <input type="checkbox" name="ung_tuyen[]" value="Dược" max="3">
                                        Dược <br>
                                        <input type="checkbox" name="ung_tuyen[]" value="Phòng điều dưỡng" max="3">
                                        Phòng điều dưỡng <br>
                                    </div>
                                    <div class="col-3">
                                        <input type="checkbox" name="ung_tuyen[]" value="Cơ xương khớp" max="3">
                                        Cơ xương khớp <br>
                                        <input type="checkbox" name="ung_tuyen[]" value="PHCN hô hấp tim mạch"
                                            max="3">
                                            PHCN hô hấp tim mạch<br>
                                        <input type="checkbox" name="ung_tuyen[]" value="KSNK"
                                            max="3">
                                        KSNK <br>
                                        <input type="checkbox" name="ung_tuyen[]" value="Khác"
                                            max="3"> Khác
                                    </div>
                                </div> <br>
                            <p style="font-weight: 600; display: inline;"> 4.Anh(chị) biết thông tin tuyển dụng
                                của
                                Công ty qua kênh nào?</p><br>
                            <div class="row">
                                <div class="col-4">
                                    <input type="checkbox" name="nguon_tuyen_dung[]" value="Người thân giới thiệu">
                                    Người thân giới thiệu <br>
                                    <input type="checkbox" name="nguon_tuyen_dung[]" value="Facebook"> Facebook

                                </div>
                                <div class="col-5">
                                    <input type="checkbox" name="nguon_tuyen_dung[]" value="Web/fanpage Công ty">
                                    Web/fanpage Công ty <br>
                                    <input type="checkbox" name="nguon_tuyen_dung[]" value="Vietnamwork"> Vietnamwork
                                </div>
                                <div class="col-3">
                                    <input type="checkbox" name="nguon_tuyen_dung[]" value="Báo chí/ Truyền hình">
                                    Báo
                                    chí/Truyền hình <br>
                                    Nguồn khác:
                                    <input class="input" style=" width: 50%;" type="text" name="nguon_tuyen_dung_khac"
                                           value="{{ old('nguon_tuyen_dung_khac') ?? '' }}"
                                           placeholder=".................................................................">
                                </div>
                            </div> <br>
                            <p style="font-weight: 600; display: inline;"> 5.Điểm yếu?</p><br>
                            <textarea name="diem_yeu" style=" width: 80%;" cols="30" rows="10">{{ old('diem_yeu') ?? '' }}</textarea> <br> <br>
                            <p style="font-weight: 600; display: inline;"> 6.Điểm mạnh?</p><br>
                            <textarea name="diem_manh" style=" width: 80%;" cols="30" rows="10">{{ old('diem_manh') ?? '' }}</textarea> <br> <br>
                            <p style="font-weight: 600; display: inline;"> 7.Mức lương mong muốn của anh(chị)
                                khi
                                vào làm việc tại công ty?</p><br>
                            <textarea required name="luong_mong_muon" style="width: 80%;" cols="30" rows="10" value="">{{ old('luong_mong_muon') ?? '' }}</textarea> <br> <br>
                            <p style="font-weight: 600; display: inline;"> 8.Anh(chị) có kiến nghị, đề xuất hoặc
                                thắc mắc muốn Công ty giải đáp không?</p><br>
                            <textarea name="de_xuat" style=" width: 80%;" cols="30" rows="10" name="content" value="">{{ old('de_xuat') ?? '' }}</textarea>
                        </div>
                    </div>

                    <br>
                    <input type="hidden" name="loai_ung_vien"
                        value="{{ \App\Modules\Nhansu\src\Models\UngVien::LOAI_UNG_VIEN_DUOC_SI }}">

                    <input type="hidden" name="chi_nhanh_slug" value="benh-vien-yhct-nguyen-phuc">

                    <div class="row">
                        <div class="col-8">
                        </div>
                        <div class="col-4 ">
                            <h5
                                style="font-weight: 600;font-family: 'Times New Roman', Times, serif; display: inline;">
                                ỨNG VIÊN
                            </h5> <br>
                            <i>(Ký,ghi rõ họ tên)</i> <br> <br>
                            <button type="submit" class="btn btn-primary">--Ký
                                tên--</button>
                        </div>
                    </div>

                </div>
            </form>
            {{--
            </div><!-- /.container-fluid --> --}}
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

        $(document).ready(function() {
            $('#profile-image').change(function(event) {
                $('#profile-image-preview').attr('src', URL.createObjectURL(event.target.files[
                    0]));
            });
        });
    })
</script>
