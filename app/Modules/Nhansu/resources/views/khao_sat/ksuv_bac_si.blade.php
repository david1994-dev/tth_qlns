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
        <form id="ksBSForm" action="{{ route('taoUngVien') }}" method="post"
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
                                placeholder="...."><i>Năm</i><input type="number" class="input" name="nam_khao_sat"
                                style=" width: 70px;" placeholder="........"></div>
                        <h4 class="tieu_de" style="margin-left: 70px;">
                            PHIẾU
                            KHẢO SÁT</h4>
                        <i style="margin-left: 70px;">(Đối tượng áp dụng: Bác sĩ)</i>
                        <p style="margin-left: 40px;font-weight: 600;"> Vị trí ứng tuyển: <input class="input"
                                name="vi_tri_ung_tuyen" style="width: 300px;"
                                placeholder="................................................................................................................................................">
                    </div>
                </div>
            </div>
            <br>
            <p style="margin-left: 220px;">Để phục vụ cho công tác tuyển dụng cán bộ-nhân viên vào làm việc tại Công ty
                và các chi nhánh</p>
            <p style="margin-left: 220px;">Kính đề nghị Bác sĩ trả lời 1 số câu hỏi khảo sát sau:</p>
            <div style="margin-left: 220px;">
                <p style="display: inline;">Họ và tên:</p> <input class="input" style="width: 300px;" name="ho_ten"
                    placeholder="......................................................................">
                <div style="text-align: right; display: inline;">
                    <p style="display: inline;">Sinh ngày</p><input type="number" class="input" style="width: 40px;"
                        name="ngay_sinh" placeholder="........">
                    <p style="display: inline;">Tháng</p><input type="number" class="input" style="width: 40px;"
                        name="thang_sinh" placeholder="........">
                    <p style="display: inline;">Năm</p><input type="number" class="input" style="width: 60px;"
                        name="nam_sinh" placeholder=".............">
                </div> <br>

                <p style="display: inline;">Chuyên ngành đào tạo:</p> <input class="input" style="width: 300px;"
                    name="chuyen_nganh_dao_tao"
                    placeholder="......................................................................"> Hệ đào tạo:
                <input class="input" name="he_dao_tao" style=" width: 115px;"
                    placeholder="..................................."><br>
                <p style="display: inline;">Địa chỉ:</p> <input class="input" style=" width: 602px;" name="dia_chi"
                    placeholder="......................................................................................................................................................."><br>
                <p style="display: inline;">Điện thoại:</p> <input class="input" style="width: 300px;"
                    name="dien_thoai"
                    placeholder="......................................................................"> Email: <input
                    name="email" class="input" style="width: 232px;"
                    placeholder="................................................................."><br>
                <p style="display: inline;">Trường đào tạo đại học:</p><input class="input" style="width: 498px;"
                    name="truong_dai_hoc"
                    placeholder="..........................................................................................................................................">
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
                <input type="checkbox" name="van_bang[]" value="BSDK"> BSDK
                <input type="checkbox" name="van_bang[]" value="Thạc sỹ"> Thạc sỹ
                <input type="checkbox" name="van_bang[]" value="CKI"> CKI
                <input type="checkbox" name="van_bang[]" value="CKII"> CKII
                <input type="checkbox" name="van_bang[]" value="BSNT"> BSNT
                <input type="checkbox" name="van_bang[]" value="NCS"> NCS



                <br>
                <p style="display: inline;">Phạm vi hoạt động CCHN:</p> <input class="input" style="width: 265px;"
                    name="pham_vi_hoat_dong_cchn"
                    placeholder="......................................................................"> Thời gian cấp
                CCHN: <input class="input" style="width: 75px;" name="thoi_gian_cap_cchn"
                    placeholder="..................................."><br>
                <p style="display: inline;">Các chứng chỉ đào tạo liên quan:</p> <input class="input"
                    style="width: 440px;"
                    placeholder="..........................................................................................................................."><br>
                <p style="display: inline;">Tình trạng hôn nhân: </p>
                <input type="radio" name="hon_nhan" value="Độc thân"> Độc thân
                <input type="radio" name="hon_nhan" value="Đã có gia đình"> Đã có gia đình
                <p style="display: inline; margin-left: 100px;">
            </div>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 1.Quá trình công tác:</p> <i>(Tính từ
                thời
                điểm sau khi tốt nghiệp đại học Y đến nay)</i> <br>
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
                        <td style="width: 100px; height: 50px; "><input name="thoi_gian_lam_viec[]" class="input">
                        </td>
                        <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]" class="input"
                                style="width: 280px"></td>
                        <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]" class="input"
                                style="width: 280px"></td>
                    </tr>
                    <tr>
                        <td style="width: 100px; height: 50px; "><input name="thoi_gian_lam_viec[]" class="input">
                        </td>
                        <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]" class="input"
                                                                        style="width: 280px"></td>
                        <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]" class="input"
                                                                        style="width: 280px"></td>
                    </tr>
                    <tr>
                        <td style="width: 100px; height: 50px; "><input name="thoi_gian_lam_viec[]" class="input">
                        </td>
                        <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]" class="input"
                                style="width: 280px"></td>
                        <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]" class="input"
                                style="width: 280px"></td>
                    </tr>
                    <tr>
                        <td style="width: 100px; height: 50px; "><input name="thoi_gian_lam_viec[]" class="input">
                        </td>
                        <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]" class="input"
                                style="width: 280px"></td>
                        <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]" class="input"
                                style="width: 280px"></td>
                    </tr>
                    <tr>
                        <td style="width: 100px; height: 50px; "><input name="thoi_gian_lam_viec[]" class="input">
                        </td>
                        <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]" class="input"
                                style="width: 280px"></td>
                        <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]" class="input"
                                style="width: 280px"></td>
                    </tr>
                    <tr>
                        <td style="width: 100px; height: 50px; "><input name="thoi_gian_lam_viec[]" class="input">
                        </td>
                        <td style="width: 300px ; height: 50px;"><input name="don_vi_cong_tac[]" class="input"
                                style="width: 280px"></td>
                        <td style="width: 300px ; height: 50px;"><input name="vi_tri_lam_viec[]" class="input"
                                style="width: 280px"></td>
                    </tr>
                </tbody>
            </table>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 2.Anh(chị) tự đánh giá trình độ chuyên
                môn
                của anh chị(chuyên nghành chính giỏi nhất)</p><br>
            <input type="radio" name="trinh_do" value="gioi" style="margin-left: 180px;"> Giỏi( thực hiện được
            100% kỹ
            thuật tuyến <p style="font-weight: 600; display: inline;">Tỉnh</p> trở xuống,80% kỹ thuật tuyến <p
                style="font-weight: 600; display: inline;">Trung ương</p>) <br>
            <input type="radio" name="trinh_do" value="kha" style="margin-left: 180px;"> Khá( thực hiện được
            90% kỹ
            thuật tuyến <p style="font-weight: 600; display: inline;">Tỉnh</p> trở xuống,70% kỹ thuật tuyến <p
                style="font-weight: 600; display: inline;">Trung ương</p>)<br>
            <input type="radio" name="trinh_do" value="trung_binh" style="margin-left: 180px;"> Trung Bình( thực
            hiện
            được 100% kỹ thuật tuyến <p style="font-weight: 600; display: inline;">Huyện</p> trở xuống,80% kỹ thuật
            tuyến <p style="font-weight: 600; display: inline;">Tỉnh</p>)<br>
            <p style="display: inline;font-weight: 600;margin-left: 180px">Các kỹ năng đặc biệt khác:</p>
            <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10"
                name="ky_nang_khac"></textarea> <br>

            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 3.Anh(chị) có nhu cầu để tiếp tục học các
                lớp nâng cao nghiệp vụ không?</p><br>
            <input type="radio" name="hoc_lop_nang_cao" value="co" style="margin-left: 180px;"> a. Có
            <input type="radio" name="hoc_lop_nang_cao" value="khong" style="margin-left: 180px;"> b. Không <br>
            <p style="margin-left: 180px;">Nếu có anh (chị) lựa chọn hình thức đào tạo gì?</p>
            <div>
                <input type="checkbox" name="hinh_thuc_dao_tao[]" value="Thạc sĩ" style="margin-left: 180px;"> a.
                Thạc sỹ
                <input type="checkbox" name="hinh_thuc_dao_tao[]" value="CKI" style="margin-left: 131px;"> b.
                Chuyên khoa I
                <input type="checkbox" name="hinh_thuc_dao_tao[]" value="Nghiên cứu sinh"
                    style="margin-left: 82px;"> c. Nghiên
                cứu sinh
            </div>
            <div>
                <input type="checkbox" name="hinh_thuc_dao_tao[]" value="CKII" style="margin-left: 180px;"> d.
                Chuyên khoa II
                <input type="checkbox" name="hinh_thuc_dao_tao[]" value="Du học nước ngoài"
                    style="margin-left: 77px;"> e. Du học
                nước
                ngoài
                <input type="checkbox" name="hinh_thuc_dao_tao[]" value="khác" style="margin-left: 50px;"> f. Khác
            </div>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 4. Anh (chị) mong muốn thời hạn ký kết
                hợp đồng như thế nào nếu được tuyển dụng vào làm việc tại Công ty?</p><br>
            <div>
                <input type="radio" name="thoi_han_hop_dong" value="7 Năm" style="margin-left: 180px;"> a. 7 năm
                <input type="radio" name="thoi_han_hop_dong" value="15 Năm" style="margin-left: 180px;"> c. 15 năm
                <input type="radio" name="thoi_han_hop_dong" value="20 Năm" style="margin-left: 180px;"> e. 20 năm
                <input type="radio" name="thoi_han_hop_dong" value="30 Năm" style="margin-left: 180px;"> g. 30 năm
            </div>
            <div>
                <input type="radio" name="thoi_han_hop_dong" value="12 Năm" style="margin-left: 180px;"> b. 12 năm
                <input type="radio" name="thoi_han_hop_dong" value="17 Năm" style="margin-left: 170px;"> d. 17 năm
                <input type="radio" name="thoi_han_hop_dong" value="25 Năm" style="margin-left: 178px;"> f. 25 năm
                <input type="radio" name="thoi_han_hop_dong" value="khác" style="margin-left: 184px;"> h. Khác
            </div>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 5.Anh(chị) có nguyện vọng làm việc vào vị
                trí nào tại Công ty (*)</p><br>
            <i style="margin-left: 220px;">- Đánh số theo thứ tự ưu tiên (1,2,3)</i> <br>
            <i style="margin-left: 220px;">- Một người được ứng tuyển 3 vị trí.</i>
            <div>
                <input type="checkbox" name="ung_tuyen[]" value="Nội tổng hợp"style="margin-left: 180px;"> Nội tổng
                hợp
                <input type="checkbox" name="ung_tuyen[]" value="Ngoại tổng hợp" style="margin-left: 113px;"> Ngoại
                tổng
                hợp
                <input type="checkbox" name="ung_tuyen[]" value="Sản phụ" style="margin-left: 65px;"> Sản phụ
                <input type="checkbox" name="ung_tuyen[]" value="Chẩn đoán hình ảnh" style="margin-left: 146px;">
                Chẩn
                đoán hình ảnh
            </div>
            <div>
                <input type="checkbox" name="ung_tuyen[]" value="Nội tim mạch" style="margin-left: 180px;"> Nội tim
                mạch
                <input type="checkbox" name="ung_tuyen[]" value="Ngoại thần kinh" style="margin-left: 113px;"> Ngoại
                thần
                kinh
                <input type="checkbox" name="ung_tuyen[]" value="Nhi" style="margin-left: 65px;"> Nhi
                <input type="checkbox" name="ung_tuyen[]" value="XN thăm dò chức năng" style="margin-left: 178px;">
                XN-
                Thăm dò chức năng
            </div>
            <div>
                <input type="checkbox" name="ung_tuyen[]" value="Nội thần kinh" style="margin-left: 180px;"> Nội
                thần
                kinh
                <input type="checkbox" name="ung_tuyen[]" value="Chấn thương chỉnh hình"
                    style="margin-left: 112px;">
                Chấn thương chỉnh hình
                <input type="checkbox" name="ung_tuyen[]" value="Y học cổ truyền" style="margin-left: 8px;"> Y học
                cổ truyền
                <input type="checkbox" name="ung_tuyen[]" value="Giải phẫu" style="margin-left: 93px;"> Giải phẫu
                bệnh
            </div>
            <div>
                <input type="checkbox" name="ung_tuyen[]" value="Phẫu thuật thẩm mỹ" style="margin-left: 180px;">
                Phẫu thuật tạo
                hình thẩm mỹ
                <input type="checkbox" name="ung_tuyen[]" value="Răng hàm mặt" style="margin-left: 2px;"> Răng hàm
                mặt
                <input type="checkbox" name="ung_tuyen[]" value="Phục hồi chức năng" style="margin-left: 75px;">
                Phục hồi chức năng
                <input type="checkbox" name="ung_tuyen[]" value="U bướu - Y học hạt nhân"
                    style="margin-left: 65px;"> U bướu - y học hạt
                nhân
            </div>
            <div>
                <input type="checkbox" name="ung_tuyen[]" value="Da liễu" style="margin-left: 180px;"> Da liễu
                <input type="checkbox" name="ung_tuyen[]" value="Tai mũi họng" style="margin-left: 158px;"> Tai mũi
                họng
                <input type="checkbox" name="ung_tuyen[]" value="Gây mê" style="margin-left: 88px;"> Gây mê
                <input type="checkbox" name="ung_tuyen[]" value="Hồi sức cấp cứu" style="margin-left: 151px;"> Hồi
                sức cấp cứu
            </div>
            <div>
                <input type="checkbox" name="ung_tuyen[]" value="Bệnh nhiệt đới" style="margin-left: 180px;"> Bệnh
                nhiệt
                đới(truyền nhiễm)
                <input type="checkbox" name="ung_tuyen[]" value="Mắt" style="margin-left: 1px;"> Mắt
                <input type="checkbox" name="ung_tuyen[]" value="Dinh dưỡng" style="margin-left: 151px;"> Dinh dưỡng
                <input type="checkbox" name="ung_tuyen[]" value="chuyên viên kế hoạch tổng hợp"
                    style="margin-left: 120px;"> Chuyên viên kế
                hoạch tổng hợp
            </div>
            <div>
                <input type="checkbox" name="ung_tuyen[]" value="Nội tiết" style="margin-left: 180px;"> Nội tiết
                <input type="checkbox" name="ung_tuyen[]" value="Chống nhiễm khuẩn" style="margin-left: 154px;">
                Chống nhiễm khuẩn
                <input type="checkbox" name="ung_tuyen[]" value="Kiểm soát chất lượng bệnh viện"
                    style="margin-left: 37px;"> Kiểm soát chất
                lượng BV
                <input type="checkbox" name="ung_tuyen[]" value="Chuyên viên truyền thông CSKH"
                    style="margin-left: 31px;"> Chuyên viên Truyền
                thông CSKH
            </div>
            <div>
                <input type="checkbox" name="ung_tuyen[]" value="khác" style="margin-left: 180px;"> Khác
            </div>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 6.Anh(chị) mong muốn công tác tại bệnh
                viện nào của công ty?</p><br>
            <div>
                <input type="checkbox" name="don_vi_ung_tuyen[]" value="bv rhm ptthtm Thái Thượng Hoàng"
                    style="margin-left: 180px;"> a.BV RHM và PTTHTM Thái Thượng Hoàng
                <input type="checkbox" name="don_vi_ung_tuyen[]" value="bv Đa Khoa Đức Thọ"
                    style="margin-left: 50px;">
                e.Bệnh viện Đa khoa TTH Đức Thọ
            </div>
            <div>
                <input type="checkbox" name="don_vi_ung_tuyen[]"
                    value="bv Đa khoa TTH Vinh"style="margin-left: 180px;"> b.Bệnh
                viện Đa khoa TTH Vinh
                <input type="checkbox" name="don_vi_ung_tuyen[]" value="bv Đa Khoa TTH Quảng Bình"
                    style="margin-left: 136px;">
                f.Bệnh viện Đa khoa TTH Quảng Bình
            </div>
            <div>
                <input type="checkbox" name="don_vi_ung_tuyen[]" value="bv Đa Khoa TTH Hưng Đông"
                    style="margin-left: 180px;">
                c.Bệnh viện Đa khoa TTH Hưng Đông
                <input type="checkbox" name="don_vi_ung_tuyen[]" value="bv Đa Khoa TTH Quảng Trị"
                    style="margin-left: 88px;">
                h.Bệnh viện Đa khoa TTH Quảng Trị
            </div>
            <div>
                <input type="checkbox" name="don_vi_ung_tuyen[]" value="bv Đa Khoa TTH Hà Tĩnh"
                    style="margin-left: 180px;">
                d.Bệnh viện Đa khoa TTH Hà Tĩnh
            </div>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 7.Anh(chị) biết thông tin tuyển dụng của
                Công ty qua kênh nào?</p><br>
            <div>
                <input type="checkbox" name="nguon_tuyen_dung[]" value="Người thân giới thiệu"
                    style="margin-left: 180px;">
                Người thân giới thiệu
                <input type="checkbox" name="nguon_tuyen_dung[]" value="Facebook" style="margin-left: 85px;">
                Facebook
                <input type="checkbox" name="nguon_tuyen_dung[]" value="Báo chí truyền hình"
                    style="margin-left: 82px;"> Báo
                chí/ Truyền hình
            </div>
            <div>
                <input type="checkbox" name="nguon_tuyen_dung[]" value="Web/FanPage" style="margin-left: 180px;">
                Web/fanpage
                Công ty
                <input type="checkbox" name="nguon_tuyen_dung[]" value="VietNamWork" style="margin-left: 82px;">
                Vietnamwork
                <input type="checkbox" name="nguon_tuyen_dung[]" value="Nguồn Khác" style="margin-left: 57px;">
                Nguồn khác
            </div>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 8.Điểm yếu?</p><br>
            <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="diem_yeu"></textarea> <br>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 9.Điểm mạnh?</p><br>
            <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="diem_manh"></textarea> <br>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 10.Mức lương mong muốn của anh(chị) khi
                vào làm việc tại công ty?</p><br>
            <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10"
                name="luong_mong_muon"></textarea> <br>
            <p style="margin-left: 180px;font-weight: 600; display: inline;"> 11.Anh(chị) có kiến nghị, đề xuất hoặc
                thắc mắc muốn Công ty giải đáp không?</p><br>
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
                            BÁC SỸ
                        </h5> <br>
                        <i style="margin-left: 175px;">(Ký,ghi rõ họ tên)</i> <br> <br>
                        <button type="submit" class="btn btn-primary" style="margin-left: 190px">--Ký
                            tên--</button>
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
    })
</script>
