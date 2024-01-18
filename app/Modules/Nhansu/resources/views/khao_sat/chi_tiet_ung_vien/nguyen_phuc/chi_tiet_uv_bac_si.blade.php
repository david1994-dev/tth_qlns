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
    <title>PHIẾU KHẢO SÁT ỨNG VIÊN BÁC SỸ</title>

    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('bieu_mau/css/bieu_mau.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        @media print {
            body {
                /*width: 400mm;*/
                /*height: 297mm;*/
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
    <div class="content-fluid">
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
            <form id="ksBSForm" method="post" class=" border border-2 border-success rounded" style="margin: auto;"
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
                                    name="ngay_khao_sat" value="{{ $model->created_at->day }}" style="width: 5%;font-style:italic"
                                    min="1" max="31" placeholder="...."><i>Tháng</i><input type="number"
                                    class="input" value="{{ $model->created_at->month }}" name="thang_khao_sat"
                                    min="1" max="12" style="width: 5%;font-style:italic" placeholder="...."><i>Năm</i><input
                                    type="number" class="input" name="nam_khao_sat"
                                    value="{{ $model->created_at->year }}" style=" width: 10%;font-style:italic" placeholder="........">
                            </div>
                            <h4 class="tieu_de" style="margin-left: 70px;">
                                PHIẾU
                                KHẢO SÁT</h4>
                            <i>(Đối tượng áp dụng: Bác sĩ)</i>
                            <p style="font-weight: 600;"> Vị trí ứng tuyển: <input class="input"
                                    name="vi_tri_ung_tuyen" value="{{ $model->vi_tri_ung_tuyen }}"
                                    style="width: 100%px;"
                                    placeholder="................................................................................................................................................">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <p style="display: inline;">
                        </div>
                        <div class="col-md-10">
                            <p>Để phục vụ cho công tác tuyển dụng cán bộ-nhân viên vào làm việc
                                tại Công
                                ty
                                và các chi nhánh</p>
                            <p>Kính đề nghị Bác sĩ trả lời 1 số câu hỏi khảo sát sau:</p>
                            <div>
                                <p style="display: inline;">Họ và tên:</p> <input class="input" required
                                    style="width: 30%;" value="{{ $model->ho_ten }}" name="ho_ten"
                                    placeholder="......................................................................">
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
                                <p style="display: inline;">Địa chỉ:</p> <input class="input" style=" width: 60%;"
                                    value="{{ $model->dia_chi }}" name="dia_chi"
                                    placeholder="......................................................................................................................................................................"><br>
                                <p style="display: inline;">Điện thoại:</p> <input class="input" style="width: 30%;"
                                    value="{{ $model->dien_thoai }}" name="dien_thoai"
                                    placeholder="......................................................................">
                                Email:
                                <input name="email" class="input" style="width: 25%;"
                                    value="{{ $model->email }}" required type="email"
                                    placeholder="................................................................."><br>
                                <p style="display: inline;">Trường đào tạo đại học:</p><input class="input" required
                                    style="width: 60%;" name="truong_dao_tao"
                                    value="{{ Arr::get($chiTietUngVien, 'truong_dao_tao', '') }}"
                                    placeholder="..........................................................................................................................................">
                                <br>
                                <p style="display: inline;">Chuyên ngành đào tạo:</p> <input class="input"
                                                                                             style="width: 30%;" name="chuyen_nganh_dao_tao"
                                                                                             value="{{ Arr::get($chiTietUngVien, 'chuyen_nganh_dao_tao', '') }}"
                                                                                             placeholder="......................................................................">
                                <br>
                                <p style="display: inline;">Tốt nghiệp loại:</p>
                                <input type="radio" name="loai_tot_nghiep" value="Giỏi"> Giỏi
                                <input type="radio" name="loai_tot_nghiep" value="Khá"> Khá
                                <input type="radio" name="loai_tot_nghiep" value="Trung Bình Khá"> TB Khá
                                <input type="radio" name="loai_tot_nghiep" value="Trung Bình"> Trung bình <br>
                                <p style="display: inline;">Loại hình đào tạo: </p>
                                <input type="radio" name="loai_hinh_dao_tao" value="Chính quy"> Chính quy
                                <input type="radio" name="loai_hinh_dao_tao" value="Chuyên tu"> Chuyên tu <br>

                                <p style="display: inline;">Văn bằng đã hoàn thành: </p>
                                <input type="checkbox" name="van_bang[]" value="BS"> <label for="BS">BS</label>
                                <input type="checkbox" name="van_bang[]" value="Thạc sỹ"> <label for="Thạc sỹ">Thạc sỹ</label>
                                <input type="checkbox" name="van_bang[]" value="CKI"> <label for="CKI">CKI</label>
                                <input type="checkbox" name="van_bang[]" value="CKII"> <label for="CKII">CKII</label>
                                <input type="checkbox" name="van_bang[]" value="BSNT"> <label for="BSNT">BSNT</label>
                                <input type="checkbox" name="van_bang[]" value="NCS"> <label for="NCS">NCS</label>
                                <br>
                                <p style="display: inline;">Phạm vi hoạt động CCHN:</p> <input class="input"
                                    value="{{ Arr::get($chiTietUngVien, 'pham_vi_hoat_dong_cchn', '') }}"
                                    style="width: 25%;" name="pham_vi_hoat_dong_cchn"
                                    placeholder="......................................................................">
                                Thời gian
                                cấp
                                CCHN: <input class="input" style="width: 15%;" name="thoi_gian_cap_cchn"
                                    value="{{ Arr::get($chiTietUngVien, 'thoi_gian_cap_cchn', '') }}"
                                    placeholder="..................................."><br>
                                <p style="display: inline;">Các chứng chỉ đào tạo liên quan:</p> <input class="input"
                                    value="{{ Arr::get($chiTietUngVien, 'chung_chi_lien_quan', '') }}"
                                    name="chung_chi_lien_quan" style="width: 60%;"
                                    placeholder="..........................................................................................................................."><br>
                                <p style="display: inline;">Tình trạng hôn nhân: </p>
                                <input type="radio" name="hon_nhan" value="Độc thân"> Độc thân
                                <input type="radio" name="hon_nhan" value="Đã có gia đình"> Đã có gia đình
                                <p style="display: inline;">
                            </div> <br>
                            <p style="font-weight: 600; display: inline;"> 1.Quá trình công tác:</p>
                            <i>(Tính từ
                                thời
                                điểm sau khi tốt nghiệp đại học Y đến nay)</i> <br>
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
                            </div>
                            <br>
                            <p style="font-weight: 600; display: inline;"> 2.Anh(chị) tự đánh giá trình
                                độ
                                chuyên
                                môn
                                của anh chị(chuyên nghành chính giỏi nhất)</p><br>
                            <input type="radio" name="trinh_do" value="gioi"> Giỏi( thực
                            hiện
                            được
                            100% kỹ
                            thuật tuyến <p style="font-weight: 600; display: inline;">Tỉnh</p> trở xuống,80% kỹ thuật
                            tuyến
                            <p style="font-weight: 600; display: inline;">Trung ương</p>) <br>
                            <input type="radio" name="trinh_do" value="kha"> Khá( thực
                            hiện
                            được
                            90% kỹ
                            thuật tuyến <p style="font-weight: 600; display: inline;">Tỉnh</p> trở xuống,70% kỹ thuật
                            tuyến
                            <p style="font-weight: 600; display: inline;">Trung ương</p>)<br>
                            <input type="radio" name="trinh_do" value="trung_binh"> Trung
                            Bình(
                            thực
                            hiện
                            được 100% kỹ thuật tuyến <p style="font-weight: 600; display: inline;">Huyện</p> trở
                            xuống,80%
                            kỹ thuật
                            tuyến <p style="font-weight: 600; display: inline;">Tỉnh</p>)<br> <br>
                            <p style="display: inline;font-weight: 600;">Các kỹ năng đặc biệt khác:</p>
                            <textarea class="form-control" aria-label="With textarea" style="width: 75%;" name="ky_nang_khac">{{ Arr::get($chiTietUngVien, 'ky_nang_khac', '') }}</textarea>
                            <br>
                            <p style="font-weight: 600; display: inline;"> 3.Anh(chị) có nhu cầu để tiếp
                                tục học
                                các
                                lớp nâng cao nghiệp vụ không?</p><br>
                            <input type="radio" name="hoc_lop_nang_cao" value="có"> a.
                            Có
                            <input type="radio" name="hoc_lop_nang_cao" value="không" style="margin-left: 180px">
                            b.
                            Không
                            <br>
                            <p>Nếu có anh (chị) lựa chọn hình thức đào tạo gì?</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="checkbox" name="hinh_thuc_dao_tao[]" value="Thạc sĩ">
                                    <label for="Thạc sỹ">Thạc sỹ</label> <br>

                                    <input type="checkbox" name="hinh_thuc_dao_tao[]" value="CKI">
                                    <label for="Chuyên khoa I">Chuyên khoa I</label>

                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="hinh_thuc_dao_tao[]" value="Nghiên cứu sinh">
                                    <label for="Nghiên cứu sinh ">Nghiên cứu sinh </label> <br>

                                    <input type="checkbox" name="hinh_thuc_dao_tao[]" value="CKII">
                                    <label for="Chuyên khoa II">Chuyên khoa II</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="hinh_thuc_dao_tao[]" value="Du học nước ngoài">
                                    <label for=" Du học nước ngoài"> Du học nước ngoài</label> <br>

                                    <input type="checkbox" name="hinh_thuc_dao_tao[]" value="khác">
                                    <label for="Khác">Khác</label>
                                </div>
                            </div> <br>
                            <p style="font-weight: 600; display: inline;"> 4. Anh (chị) mong muốn thời
                                hạn ký
                                kết
                                hợp đồng như thế nào nếu được tuyển dụng vào làm việc tại Công ty?</p><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="radio" name="thoi_han_hop_dong" value="7 Năm"> 7
                                    năm <br>
                                    <input type="radio" name="thoi_han_hop_dong" value="20 Năm"> 20
                                    năm
                                </div>
                                <div class="col-md-3">
                                    <input type="radio" name="thoi_han_hop_dong" value="12 Năm"> 12
                                    năm <br>
                                    <input type="radio" name="thoi_han_hop_dong" value="25 Năm"> 25
                                    năm

                                </div>
                                <div class="col-md-3">
                                    <input type="radio" name="thoi_han_hop_dong" value="15 Năm"> 15
                                    năm <br>
                                    <input type="radio" name="thoi_han_hop_dong" value="30 Năm"> 30
                                    năm

                                </div>
                                <div class="col-md-3">
                                    <input type="radio" name="thoi_han_hop_dong" value="17 Năm"> 17
                                    năm <br>
                                    Khác:
                                    <input class="input" style=" width: 50%;" type="text" name="thoi_han_hop_dong_khac"
                                           value="{{ Arr::get($chiTietUngVien, 'thoi_han_hop_dong_khac', '') }}">
                                </div>
                            </div> <br>
                            <p style="font-weight: 600; display: inline;"> 5.Anh(chị) có nguyện vọng làm
                                việc
                                vào vị
                                trí nào tại Công ty (*)</p><br>
                            <i>- Đánh số theo thứ tự ưu tiên (1,2,3)</i> <br>
                            <i>- Một người được ứng tuyển 3 vị trí.</i>
                            <div class="row">
                                <div class="col-3">
                                    <input type="checkbox" name="ung_tuyen[]" value="Khám bệnh cấp cứu"
                                        max="3"> <label for="Khám bệnh cấp cứu">Khám bệnh cấp cứu</label> <br>

                                    <input type="checkbox" name="ung_tuyen[]" value="Trung tâm oxi cao áp"
                                        max="3">
                                    <label for="Trung tâm oxi cao áp">Trung tâm oxi cao áp</label><br>

                                    <input type="checkbox" name="ung_tuyen[]" value="PHCN Tổng hợp"
                                        max="3">
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
                                    <label for="CĐHA-TDCN">CĐHA-TDCN</label> <br>

                                    <input type="checkbox" name="ung_tuyen[]" value="Phòng QLCL" max="3">
                                    <label for="Phòng QLCL">Phòng QLCL</label>
                                </div>
                                <div class="col-3">
                                    <input type="checkbox" name="ung_tuyen[]" value="Lão Khoa" max="3">
                                    <label for="Lão Khoa">Lão Khoa</label> <br>

                                    <input type="checkbox" name="ung_tuyen[]" value="PHCN sau chấn thương"
                                        max="3"> <label for="PHCN sau chấn thương">PHCN sau chấn thương</label><br>

                                    <input type="checkbox" name="ung_tuyen[]" value="PHCN ung thư"
                                        max="3">
                                    <label for="PHCN ung thư">PHCN ung thư</label> <br>

                                    <input type="checkbox" name="ung_tuyen[]" value="Dược" max="3">
                                    <label for="Dược">Dược</label> <br>

                                    <input type="checkbox" name="ung_tuyen[]" value="Phòng điều dưỡng" max="3">
                                    <label for="Phòng điều dưỡng">Phòng điều dưỡng</label> <br>
                                </div>
                                <div class="col-3">
                                    <input type="checkbox" name="ung_tuyen[]" value="Cơ xương khớp" max="3">
                                    <label for="Cơ xương khớp">Cơ xương khớp</label> <br>

                                    <input type="checkbox" name="ung_tuyen[]" value="PHCN hô hấp tim mạch"
                                        max="3">
                                        <label for="PHCN hô hấp tim mạch">PHCN hô hấp tim mạch</label><br>

                                    <input type="checkbox" name="ung_tuyen[]" value="KSNK"
                                        max="3">
                                    <label for="KSNK">KSNK</label> <br>

                                    <input type="checkbox" name="ung_tuyen[]" value="Khác"
                                        max="3"> <label for="Khác ">Khác </label>
                                </div>
                            </div> <br>

                            <p style="font-weight: 600; display: inline;"> 6.Anh(chị) biết thông tin
                                tuyển dụng
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
                                    <input type="checkbox" name="nguon_tuyen_dung[]" value="Web/FanPage">
                                    <label for="Web/fanpage Công ty">Web/fanpage Công ty</label> <br>

                                    <input type="checkbox" name="nguon_tuyen_dung[]" value="Vietnamwork">
                                    <label for="Vietnamwork">Vietnamwork</label>
                                </div>
                                <div class="col-3">
                                    <input type="checkbox" name="nguon_tuyen_dung[]" value="Báo chí/ Truyền hình">
                                    <label for="Báo chí/Truyền hình">Báo chí/Truyền hình</label> <br>

                                    <input class="input" style=" width: 50%;" type="text" name="nguon_tuyen_dung_khac"
                                           value="{{ Arr::get($chiTietUngVien, 'nguon_tuyen_dung_khac', '') }}">
                                    <label for="Nguồn khác">Nguồn khác</label>
                                </div>
                            </div> <br>
                            <p style="font-weight: 600; display: inline;"> 7.Điểm yếu?</p><br>
                            <textarea style=" width: 80%; height: 100px;" cols="30" rows="10" name="diem_yeu">{{ Arr::get($chiTietUngVien, 'diem_yeu', '') }}</textarea> <br> <br>
                            <p style="font-weight: 600; display: inline;"> 8.Điểm mạnh?</p><br>
                            <textarea style=" width: 80%; height: 100px;" cols="30" rows="10" name="diem_manh">{{ Arr::get($chiTietUngVien, 'diem_manh', '') }}</textarea> <br> <br>
                            <p style="font-weight: 600; display: inline;"> 9.Mức lương mong muốn của
                                anh(chị)
                                khi
                                vào làm việc tại công ty?</p><br>
                            <textarea required style=" width: 80%; height: 100px;" cols="30" rows="10" name="luong_mong_muon">{{ Arr::get($chiTietUngVien, 'luong_mong_muon', '') }}</textarea> <br> <br>
                            <p style="font-weight: 600; display: inline;"> 10.Anh(chị) có kiến nghị, đề
                                xuất
                                hoặc
                                thắc mắc muốn Công ty giải đáp không?</p><br>
                            <textarea style=" width: 80%; height: 100px;" cols="30" rows="10" name="de_xuat">{{ Arr::get($chiTietUngVien, 'de_xuat', '') }}</textarea>
                        </div>
                    </div>
                    <br>
                    <div>
                        <div class="row">
                            <div class="col-8">
                            </div>
                            <div class="col-4">
                                <h5
                                    style="font-weight: 600;font-family: 'Times New Roman', Times, serif; display: inline;">
                                    BÁC SỸ
                                </h5> <br>
                                <i>(Ký,ghi rõ họ tên)</i> <br>
                                <div>
                                    {{ $model->ho_ten }} <br>
                                    <small>{{ $model->ngay_ky->format('d-m-Y H:i:s') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
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
    $(document).ready(function() {
        $('#ksBSForm :input').prop("readonly", true);
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
