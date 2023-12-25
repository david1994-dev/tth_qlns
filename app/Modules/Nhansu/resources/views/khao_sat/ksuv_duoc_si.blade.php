@extends('adminlte.Layout.app')

@section('metadata')
@stop

@section('styles')

@stop

@section('scripts')
    <script>
        $("input[type=checkbox][name=ung_tuyen]").click(function() {

            var bol = $("input[type=checkbox][name=ung_tuyen]:checked").length >= 3;
            $("input[type=checkbox][name=ung_tuyen]").not(":checked").attr("disabled", bol);

        });
    </script>
@stop

@section('title')
@stop

@section('header')
@stop

@section('breadcrumb')
@stop

@section('content')
    <div class="content">
        <div class="container-fluid ">
            <form class="w-75 border border-2 border-success p-5 rounded" style="margin: auto;">
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRK9A2qlhiiaIkO6qETm9ihfEy7AGvj3eAnH7fd-MQxqxouWOja2pxD9KE6JiLgn-gYOk&usqp=CAU"
                                alt="" width="100px" height="130px">
                        </div>
                        <div class="col-9 ">
                            <div style="text-align: right;"><i>Ngày</i><input type="text" class="input"
                                    style="width: 20px;" placeholder="...."><i>Tháng</i><input type="text" class="input"
                                    style="width: 20px;" placeholder="...."><i>Năm</i><input type="text" class="input"
                                    style=" width: 40px;" placeholder="........"></div>
                            <h4 class="tieu_de" style="margin-left: 70px;">
                                PHIẾU
                                KHẢO SÁT ỨNG VIÊN</h4>
                            <i style="margin-left: 70px;">(Đối tượng áp dụng: Nhân viên điều dưỡng,KTV,Dược sỹ)</i>
                            <p style="margin-left: 70px;font-weight: 600;"> Vị trí ứng tuyển: <input class="input"
                                    style="width: 300px;"
                                    placeholder="................................................................................................................................................">
                        </div>
                    </div>
                </div>
                <br>
                <p style="margin-left: 220px;">Để phục vụ cho công tác tuyển dụng cán bộ-nhân viên vào làm việc tại Công ty
                    và các chi nhánh</p>
                <p style="margin-left: 220px;">Công ty đề nghị ứng viên trả lời 1 số câu hỏi khảo sát sau:</p>
                <div style="margin-left: 220px;">
                    <p style="display: inline;">Họ và tên ứng viên:</p> <input class="input" style="width: 300px;"
                        placeholder="......................................................................"> Ngày sinh:
                    <input class="input" style=" width: 150px;" placeholder="..................................."> <br>
                    <p style="display: inline;">Trường đào tạo:</p> <input class="input" style="width: 546px;"
                        placeholder="..........................................................................................................................................">
                    <br>
                    <p style="display: inline;">Chuyên ngành đào tạo:</p> <input class="input" style="width: 300px;"
                        placeholder="......................................................................"> Hệ đào tạo:
                    <input class="input" style="width: 115px;" placeholder="..................................."><br>
                    <p style="display: inline;">Địa chỉ:</p> <input class="input" style="width: 602px;"
                        placeholder="......................................................................................................................................................."><br>
                    <p style="display: inline;">Điện thoại:</p> <input class="input" style="width: 300px;"
                        placeholder="......................................................................"> Email: <input
                        class="input" style="width: 232px;"
                        placeholder="................................................................."><br>
                    <p style="display: inline;">Chiều cao:</p> <input class="input" style=" width: 300px;"
                        placeholder="......................................................................"> Cân nặng:
                    <input class="input" style="width: 210px;"
                        placeholder="........................................................."><br>
                    <p style="display: inline;">Tình trạng hôn nhân: </p>
                    <input type="radio" name="hon_nhan" value="doc_than"> Độc thân
                    <input type="radio" name="hon_nhan" value="da_co_gia_dinh"> Đã có gia đình
                    <p style="display: inline; margin-left: 100px;">Số con: </p> <input class="input" style="width: 168px;"
                        placeholder="......................................................................"><br>
                    <p style="display: inline;">Tình trạng Chứng chỉ hành nghề: </p>
                    <input type="radio" name="chung_chi_hanh_nghe" value="da_co"> Đã có
                    <input type="radio" name="chung_chi_hanh_nghe" value="chua_co"> Chưa có
                    <br>
                    <p style="display: inline;">Các chứng chỉ đào tạo khác:</p> <input class="input" style="width: 470px;"
                        placeholder="...........................................................................................................................">
                </div>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 1.Quá trình công tác:</p> <i>(Dành cho
                    những người đã có kinh nghiệm công tác)</i> <br>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 2.Anh(chị) có khả năng(Thời gian, kinh tế,
                    ...) để tiếp tục học các lớp nâng cao nghiệp vụ không?</p><br>
                <input type="radio" name="hoc_lop_nang_cao" value="co" style="margin-left: 180px;"> a. Có
                <input type="radio" name="hoc_lop_nang_cao" value="khong" style="margin-left: 180px;"> b. Không <br>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 3.Anh(chị) có nguyện vọng ứng tuyển vào
                    khoa nào tại Công ty? (*)</p><br>
                <i style="margin-left: 220px;">- Đánh số theo thứ tự ưu tiên (1,2,3); Một người được ứng tuyển 3 vị
                    trí.</i>
                <div>
                    <div>
                        <input type="checkbox" name="ung_tuyen" value="noi_khoa"style="margin-left: 180px;"
                            max="3">
                        Nội khoa
                        <input type="checkbox" name="ung_tuyen" value="san_phu_khoa" style="margin-left: 50px;"
                            max="3"> Sản phụ khoa
                        <input type="checkbox" name="ung_tuyen" value="xet_nghiem" style="margin-left: 50px;"
                            max="3"> Xét nghiệm
                        <input type="checkbox" name="ung_tuyen" value="rang_ham_mat" style="margin-left: 196px;"
                            max="3"> Răng hàm mặt
                    </div>
                    <div>
                        <input type="checkbox" name="ung_tuyen" value="ngoai_khoa" style="margin-left: 180px;"
                            max="3"> Ngoại khoa
                        <input type="checkbox" name="ung_tuyen" value="nhi_khoa" style="margin-left: 35px;"
                            max="3">
                        Nhi khoa
                        <input type="checkbox" name="ung_tuyen" value="chan_doan" style="margin-left: 82px;"
                            max="3"> Chẩn đoán hình
                        ảnh- thăm dò CN
                        <input type="checkbox" name="ung_tuyen" value="tai_mui_hong" style="margin-left: 50px;"
                            max="3"> Tai mũi họng
                    </div>
                    <div>
                        <input type="checkbox" name="ung_tuyen" value="mat" style="margin-left: 180px;"
                            max="3">
                        Mắt
                        <input type="checkbox" name="ung_tuyen" value="u_buoc_y_hoc_hat_nhan" style="margin-left: 85px;"
                            max="3"> U
                        bước-Y học hạt nhân
                        <input type="checkbox" name="ung_tuyen" value="dinh_duong" style="margin-left: 82px;"
                            max="3"> dinh dưỡng
                        <input type="checkbox" name="ung_tuyen" value="chuyen_vien_ke_hoach_tong_hop"
                            style="margin-left: 50px;" max="3"> Chuyên viên kế hoạch tổng hợp
                    </div>
                    <div>
                        <input type="checkbox" name="ung_tuyen" value="YHCT" style="margin-left: 180px;"
                            max="3">
                        YHCT
                        <input type="checkbox" name="ung_tuyen" value="hoi_suc_cap_cuu" style="margin-left: 75px;"
                            max="3"> Hồi sức cấp
                        cứu
                        <input type="checkbox" name="ung_tuyen" value="tham_my_da_lieu" style="margin-left: 38px;"
                            max="3"> Thẩm mỹ -
                        da liễu
                        <input type="checkbox" name="ung_tuyen" value="gay_me_phau_thuat" style="margin-left: 152px;"
                            max="3"> Gây mê -
                        Phẫu thuật
                    </div>
                    <div>
                        <input type="checkbox" name="ung_tuyen" value="ksclbv" style="margin-left: 180px;"
                            max="3">
                        Kiểm soát chất
                        lượng BV
                    </div>
                </div>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 4.Anh(chị) mong muốn công tác tại bệnh
                    viện nào của công ty?</p><br>
                <div>
                    <input type="checkbox" name="bv_rhm_ptthtm_thai_thuong_hoang"
                        value="yes"style="margin-left: 180px;"> a.BV RHM và PTTHTM Thái Thượng Hoàng
                    <input type="checkbox" name="bv_da_khoa_tth_duc_tho" value="yes" style="margin-left: 50px;">
                    e.Bệnh viện Đa khoa TTH Đức Thọ
                </div>
                <div>
                    <input type="checkbox" name="bv_da_khoa_tth_vinh" value="yes"style="margin-left: 180px;"> b.Bệnh
                    viện Đa khoa TTH Vinh
                    <input type="checkbox" name="bv_da_khoa_tth_quang_binh" value="yes" style="margin-left: 126px;">
                    f.Bệnh viện Đa khoa TTH Quảng Bình
                </div>
                <div>
                    <input type="checkbox" name="bv_yhct_phcn_hung_dong" value="yes"style="margin-left: 180px;">
                    c.Bệnh viện Đa khoa TTH Hưng Đông
                    <input type="checkbox" name="bv_da_khoa_tth_quang_tri" value="yes" style="margin-left: 82px;">
                    h.Bệnh viện Đa khoa TTH Quảng Trị
                </div>
                <div>
                    <input type="checkbox" name="bv_da_khoa_tth_ha_tinh" value="yes"style="margin-left: 180px;">
                    d.Bệnh viện Đa khoa TTH Hà Tĩnh
                </div>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 5.Anh(chị) biết thông tin tuyển dụng của
                    Công ty qua kênh nào?</p><br>
                <div>
                    <input type="checkbox" name="nguoi_than_gioi_thieu" value="yes" style="margin-left: 180px;">
                    Người thân giới thiệu
                    <input type="checkbox" name="facebook" value="yes" style="margin-left: 85px;"> Facebook
                    <input type="checkbox" name="bao_chi_truyen_hinh" value="yes" style="margin-left: 82px;"> Báo
                    chí/ Truyền hình
                </div>
                <div>
                    <input type="checkbox" name="web_fanpage" value="yes" style="margin-left: 180px;"> Web/fanpage
                    Công ty
                    <input type="checkbox" name="vietnamwork" value="yes" style="margin-left: 82px;"> Vietnamwork
                    <input type="checkbox" name="nguon_khac" value="yes" style="margin-left: 57px;"> Nguồn khác
                </div>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 6.Điểm yếu?</p><br>
                <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="content"></textarea>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 7.Điểm mạnh?</p><br>
                <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="content"></textarea>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 8.Mức lương mong muốn của anh(chị) khi
                    vào làm việc tại công ty?</p><br>
                <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="content"></textarea>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 9.Anh(chị) có kiến nghị, đề xuất hoặc
                    thắc mắc muốn Công ty giải đáp không?</p><br>
                <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="content"></textarea>
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
                        </div>
                    </div>
                </div>
            </form>

        </div><!-- /.container-fluid -->
    </div>
@stop
