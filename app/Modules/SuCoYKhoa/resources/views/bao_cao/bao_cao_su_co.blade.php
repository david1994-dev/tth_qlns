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

{{--    <link rel="stylesheet" href="{{ asset('bieu_mau/css/bieu_mau.css') }}">--}}

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
    <form action="{{route('sucoykhoa.taoBaoCao')}}" method="post" class=" border border-2 border-success  rounded"
          style="margin: auto;">
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
                                                           name="don_vi_bao_cao"
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
                                                     name="ho_ten_nguoi_benh"
                                                     placeholder="................................................................................................................................"
                                                     style="width: 80%"> <br>
                                    Số bệnh án:<input type="text" class="input"
                                                      name="so_benh_an"
                                                      placeholder="......................................................................................................................."
                                                      style="width: 80%"> <br>
                                    Ngày sinh: <input type="date" id="ngay_sinh" class="form-control"
                                                      name="ngay_sinh" style="width: 50% ;display: inline;"> <br>
                                    Giới tính: <input type="text" class="input"
                                                      name="gioi_tinh"
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
                                                              class="form-control" name="ngay_su_co"
                                                              style="width: 30% ;display: inline;">
                                    Thời gian: <input type="text" class="input"
                                                      name="thoi_gian_su_co"
                                                      placeholder="......................................................"
                                                      style="width: 20%">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    Mô tả ngắn gọn về sự cố:
                                    <textarea style=" width: 100%; height: 100px;" cols="30" rows="10" name="mo_ta" class="input"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    Đề xuất giải pháp ban đầu:
                                    <textarea style=" width: 100%; height: 100px;" cols="30" rows="10" name="de_xuat_giai_phap" class="input"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    Điều trị/xử lí ban đầu đã được thực hiện
                                    <textarea style=" width: 100%; height: 100px;" cols="30" rows="10" name="giai_phap_da_thuc_hien" class="input"></textarea>
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
                                    <input type="radio" name="ghi_nhan_vao_ho_so" value="Có"> Có
                                    <input type="radio" name="ghi_nhan_vao_ho_so" value="Không"> Không
                                    <input type="radio" name="ghi_nhan_vao_ho_so" value="Không ghi nhận"> Không ghi
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
                                                  name="ho_ten_nguoi_bao"
                                                  placeholder="................................................................................"
                                                  style="width: 25%; display: inline"> Số điện thoại: <input
                                        type="text" class="input"
                                        name="dien_thoai_nguoi_bao"
                                        placeholder="......................................................................................"
                                        style="width: 25%; display: inline"> Email: <input type="text"
                                                                                           name="email_nguoi_bao"
                                                                                           class="input"
                                                                                           placeholder="....................................................................................."
                                                                                           style="width: 25%; display: inline">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="radio" name="doi_tuong_bao_cao" value="Điều dưỡng (chức danh)"> Điều dưỡng
                                    (chức danh)
                                    <input type="radio" name="doi_tuong_bao_cao" value="Người bệnh"
                                           style="margin-left: 15%"> Người bệnh
                                    <input type="radio" name="doi_tuong_bao_cao" value="Người nhà/khách đến thăm"
                                           style="margin-left: 15%"> Người nhà/khách đến thăm <br>
                                    <input type="radio" name="doi_tuong_bao_cao" value="Bác sỹ (chức danh)"> Bác sỹ (chức danh)
                                    <input type="radio" name="doi_tuong_bao_cao" value="Khác (ghi cụ thể)"
                                           style="margin-left: 18.6%"> Khác (ghi cụ thể): <input type="text"
                                                                                                 name="doi_tuong_bao_cao_khac"
                                                                                                 class="input"
                                                                                                 placeholder="....................................................................................."
                                                                                                 style="width: 25%; display: inline">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    Người chứng kiến 1: <input type="text" class="input"
                                                               name="nguoi_chung_kien_1"
                                                               placeholder="................................................................................"
                                                               style="width: 25%; display: inline">
                                </td>
                                <td class="text-center">
                                    Người chứng kiến 2:
{{--                                    <button type="submit" class="btn btn-primary">--Ký--}}
{{--                                        tên--</button>--}}
                                    <input type="text" class="input"
                                           name="nguoi_chung_kien_2"
                                           placeholder="................................................................................"
                                           style="width: 25%; display: inline">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-6">
                        </div>
                        <div class="col-6 ">
                        </div>
                    </div>

                    <br>


                </div>
            </div>
            <div class="row text-right pb-4">
                <div class="col-2 offset-10">
                    <button type="submit" class="btn btn-primary">--Ký
                        tên--</button>
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

<script>

</script>
