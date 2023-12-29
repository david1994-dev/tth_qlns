<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHIẾU KHẢO SÁT ỨNG VIÊN BÁC SỸ</title>

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

        .khung_vien {
            border-width: 1px;
            border-style: solid;
            border-color: black;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="container-fluid">
        <form id="ksBSForm" method="post" class=" border border-2 border-success  rounded"
            style="margin: auto;" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-5">
                        <h6 class="tieu_de text-center">BỆNH VIỆN RHM VÀ PTTHTM</h6>
                        <h6 class="tieu_de" style="text-align: center"><u>THÁI THƯỢNG HOÀNG</u></h6>

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
                        <div class="table-responsive-md">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="tieu_de">HÌNH THỨC BÁO CÁO SỰ CỐ Y KHOA: <br>
                                            <input type="radio" name="hinh_thuc" value="Tự nguyện"> Tự nguyện <br>
                                            <input type="radio" name="hinh_thuc" value="Bắt buộc"> Bắt buộc
                                        </th>
                                        <th scope="col" class="tieu_de">
                                            Số báo cáo/Mã số sự cố: <br>
                                            Ngày báo cáo: <input type="date" id="ngay_sinh" class="form-control"
                                                name="ngay_bao_cao" style="width: 50% ;display: inline;"> <br>
                                            Đơn vị báo cáo: <input type="text" class="input"
                                                placeholder="...................................">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="tieu_de">Thông tin người bệnh</th>
                                        <th scope="col" class="tieu_de">Đối tượng xảy ra sự cố</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Họ và tên:<input type="text" class="input"
                                                placeholder="................................................................................................................................"
                                                style="width: 80%"> <br>
                                            Số bệnh án:<input type="text" class="input"
                                                placeholder="......................................................................................................................."
                                                style="width: 80%"> <br>
                                            Ngày sinh: <input type="date" id="ngay_sinh" class="form-control"
                                                name="ngay_bao_cao" style="width: 50% ;display: inline;"> <br>
                                            Giới tính: <input type="text" class="input"
                                                placeholder="......................................................"
                                                style="width: 15%"> <br>
                                        </td>
                                        <td> <input type="radio" name="hinh_thuc" value="Người bệnh"> Người bệnh <br>
                                            <input type="radio" name="hinh_thuc" value="Người nhà/khách đến thăm ">
                                            Người
                                            nhà/khách đến thăm <br>
                                            <input type="radio" name="hinh_thuc" value="Nhân viên y tế "> Nhân viên y
                                            tế
                                            <br>
                                            <input type="radio" name="hinh_thuc" value="Trang thiết bị/cơ sở hạ tầng">
                                            Trang thiết bị/cơ sở hạ tầng
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="tieu_de">
                                            Nơi xảy ra sự cố:
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tieu_de">
                                            Khoa/phòng/vị trí xảy ra sự cố:
                                            <textarea style=" width: 80%; height: 100px;" cols="30" rows="10" name="khoa_phong_su_co" class="input"></textarea>
                                        </td>
                                        <td class="tieu_de">
                                            Vị trí cụ thể:
                                            <textarea style=" width: 80%; height: 100px;" cols="30" rows="10" name="vi_tri_cu_the" class="input"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Ngày xảy ra sự cố: <input type="date" id="ngay_sinh"
                                                class="form-control" name="ngay_bao_cao"
                                                style="width: 30% ;display: inline;">
                                            Thời gian: <input type="text" class="input"
                                                placeholder="......................................................"
                                                style="width: 20%">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Mô tả ngắn gọn về sự cố:
                                            <textarea style=" width: 100%; height: 100px;" cols="30" rows="10" name="vi_tri_cu_the" class="input"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Đề xuất giải pháp ban đầu:
                                            <textarea style=" width: 100%; height: 100px;" cols="30" rows="10" name="vi_tri_cu_the" class="input"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Điều trị/xử lí ban đầu đã được thực hiện
                                            <textarea style=" width: 100%; height: 100px;" cols="30" rows="10" name="vi_tri_cu_the" class="input"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="col" class="tieu_de">Thông báo cho Bác sĩ điều trị/người có
                                            trách
                                            nhiệm</td>
                                        <td scope="col" class="tieu_de">Ghi nhận vào hồ sơ bệnh án/giấy tờ liên
                                            quan
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="radio" name="thong_bao_bac_si" value="Có"> Có
                                            <input type="radio" name="thong_bao_bac_si" value="Không"> Không
                                            <input type="radio" name="thong_bao_bac_si" value="Không ghi nhận">
                                            Không
                                            ghi nhận
                                        </td>
                                        <td>
                                            <input type="radio" name="ghi_nhan" value="Có"> Có
                                            <input type="radio" name="ghi_nhan" value="Không"> Không
                                            <input type="radio" name="ghi_nhan" value="Không ghi nhận"> Không ghi
                                            nhận
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Thông báo cho người nhà/người bảo hộ
                                        </td>
                                        <td>
                                            Thông báo cho người bệnh
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="radio" name="thong_bao_nguoi_nha" value="Có"> Có
                                            <input type="radio" name="thong_bao_nguoi_nha" value="Không"> Không
                                            <input type="radio" name="thong_bao_nguoi_nha" value="Không ghi nhận">
                                            Không ghi nhận
                                        </td>
                                        <td>
                                            <input type="radio" name="thong_bao_benh_nhan" value="Có"> Có
                                            <input type="radio" name="thong_bao_benh_nhan" value="Không"> Không
                                            <input type="radio" name="thong_bao_benh_nhan" value="Không ghi nhận">
                                            Không ghi nhận
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="tieu_de">
                                            Phân loại ban đầu về sự cố
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="radio" name="phan_loai_ban_dau" value="Chưa xảy ra"> Chưa
                                            xảy
                                            ra
                                            <input type="radio" name="phan_loai_ban_dau" value="Đã xảy ra"
                                                style="margin-left: 30%"> Đã xảy ra
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="tieu_de">
                                            Đánh giá ban đầu về mức độ ảnh hưởng của sự cố
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="radio" name="danh_gia_ban_dau" value="Nặng"> Nặng <br>
                                            <input type="radio" name="danh_gia_ban_dau" value="Trung bình"> Trung
                                            bình
                                            <br>
                                            <input type="radio" name="danh_gia_ban_dau" value="Nhẹ"> Nhẹ
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="tieu_de">
                                            Thông tin người báo cáo
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Họ tên:<input type="text" class="input"
                                                placeholder="................................................................................"
                                                style="width: 25%; display: inline"> Số điện thoại: <input
                                                type="text" class="input"
                                                placeholder="......................................................................................"
                                                style="width: 25%; display: inline"> Email: <input type="text"
                                                class="input"
                                                placeholder="....................................................................................."
                                                style="width: 25%; display: inline">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="radio" name="nguoi_bao_cao" value="Nặng"> Điều dưỡng
                                            (chức
                                            danh)
                                            <input type="radio" name="nguoi_bao_cao" value="Trung bình"
                                                style="margin-left: 15%"> Người bệnh
                                            <input type="radio" name="nguoi_bao_cao" value="Nhẹ"
                                                style="margin-left: 15%"> Người nhà/khách đến thăm <br>
                                            <input type="radio" name="nguoi_bao_cao" value="Trung bình"> Bác sỹ
                                            (chức
                                            danh)
                                            <input type="radio" name="nguoi_bao_cao" value="Nhẹ"
                                                style="margin-left: 18.6%"> Khác (ghi cụ thể): <input type="text"
                                                class="input"
                                                placeholder="....................................................................................."
                                                style="width: 25%; display: inline">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            Người chứng kiến 1: <br>
                                            <button type="submit" class="btn btn-primary">--Ký
                                                tên--</button>
                                        </td>
                                        <td class="text-center">
                                            Người chứng kiến 2: <br>
                                            <button type="submit" class="btn btn-primary">--Ký
                                                tên--</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row">

                        </div>

                        <div class="row">
                            <div class="col-6">
                            </div>
                            <div class="col-6 ">
                            </div>
                        </div>

                        <br>



                        <input type="hidden" name="loai_ung_vien"
                            value="{{ \App\Modules\Nhansu\src\Models\UngVien::LOAI_UNG_VIEN_BAC_SI }}">
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

        $('#ksBSForm').submit(event => {
            event.preventDefault();
            // remove all previous checkbox append
            $('.hidden_input_to_save').remove();

            // append field depends on ordered list
            orderedCheckbox.forEach((value, key) => {
                $('form').append(
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
