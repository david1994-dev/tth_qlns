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
                                KHẢO SÁT</h4>
                            <i style="margin-left: 70px;">(Đối tượng áp dụng: Bác sĩ)</i>
                            <p style="margin-left: 40px;font-weight: 600;"> Vị trí ứng tuyển: <input class="input"
                                    style="width: 300px;"
                                    placeholder="................................................................................................................................................">
                        </div>
                    </div>
                </div>
                <br>
                <p style="margin-left: 220px;">Để phục vụ cho công tác tuyển dụng cán bộ-nhân viên vào làm việc tại Công ty
                    và các chi nhánh</p>
                <p style="margin-left: 220px;">Kính đề nghị Bác sĩ trả lời 1 số câu hỏi khảo sát sau:</p>
                <div style="margin-left: 220px;">
                    <p style="display: inline;">Họ và tên:</p> <input class="input" style="width: 300px;"
                        placeholder="......................................................................">
                    <div style="text-align: right; display: inline;">
                        <p style="display: inline;">Sinh ngày</p><input type="text" class="input" style="width: 40px;"
                            placeholder="........">
                        <p style="display: inline;">Tháng</p><input type="text" class="input" style="width: 40px;"
                            placeholder="........">
                        <p style="display: inline;">Năm</p><input type="text" class="input" style="width: 60px;"
                            placeholder=".............">
                    </div> <br>

                    <p style="display: inline;">Chuyên ngành đào tạo:</p> <input class="input" style="width: 300px;"
                        placeholder="......................................................................"> Hệ đào tạo:
                    <input class="input" style=" width: 115px;" placeholder="..................................."><br>
                    <p style="display: inline;">Địa chỉ:</p> <input class="input" style=" width: 602px;"
                        placeholder="......................................................................................................................................................."><br>
                    <p style="display: inline;">Điện thoại:</p> <input class="input" style="width: 300px;"
                        placeholder="......................................................................"> Email: <input
                        class="input" style="width: 232px;"
                        placeholder="................................................................."><br>
                    <p style="display: inline;">Trường đào tạo đại học:</p><input class="input" style="width: 498px;"
                        placeholder="..........................................................................................................................................">
                    <br>
                    <p style="display: inline;">Tốt nghiệp loại:</p>
                    <input type="radio" name="loai_tot_nghiep" value="gioi"> Giỏi
                    <input type="radio" name="loai_tot_nghiep" value="kha"> Khá
                    <input type="radio" name="loai_tot_nghiep" value="tbkha"> TB Khá
                    <input type="radio" name="loai_tot_nghiep" value="trung_binh"> Trung bình <br>
                    <p style="display: inline;">Loại hình đào tạo: </p>
                    <input type="radio" name="loai_hinh_dao_tao" value="chinh_quy"> Chính quy
                    <input type="radio" name="loai_hinh_dao_tao" value="chuyen_tu"> Chuyên tu <br>

                    <p style="display: inline;">Văn bằng đã hoàn thành: </p>
                    <input type="checkbox" name="van_bang" value="bsdk"> BSDK
                    <input type="checkbox" name="van_bang" value="thac_sy"> Thạc sỹ
                    <input type="checkbox" name="van_bang" value="ckI"> CKI
                    <input type="checkbox" name="van_bang" value="ckII"> CKII
                    <input type="checkbox" name="van_bang" value="bsnt"> BSNT
                    <input type="checkbox" name="van_bang" value="ncs"> NCS



                    <br>
                    <p style="display: inline;">Phạm vi hoạt động CCHN:</p> <input class="input" style="width: 265px;"
                        placeholder="......................................................................"> Thời gian cấp
                    CCHN: <input class="input" style="width: 75px;"
                        placeholder="..................................."><br>
                    <p style="display: inline;">Các chứng chỉ đào tạo liên quan:</p> <input class="input"
                        style="width: 440px;"
                        placeholder="..........................................................................................................................."><br>
                    <p style="display: inline;">Tình trạng hôn nhân: </p>
                    <input type="radio" name="hon_nhan" value="doc_than"> Độc thân
                    <input type="radio" name="hon_nhan" value="da_co_gia_dinh"> Đã có gia đình
                    <p style="display: inline; margin-left: 100px;">
                </div>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 1.Quá trình công tác:</p> <i>(Tính từ
                    thời
                    điểm sau khi tốt nghiệp đại học Y đến nay)</i> <br>
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
                <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="content"></textarea>

                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 3.Anh(chị) có nhu cầu để tiếp tục học các
                    lớp nâng cao nghiệp vụ không?</p><br>
                <input type="radio" name="hoc_lop_nang_cao" value="co" style="margin-left: 180px;"> a. Có
                <input type="radio" name="hoc_lop_nang_cao" value="khong" style="margin-left: 180px;"> b. Không <br>
                <p style="margin-left: 180px;">Nếu có anh (chị) lựa chọn hình thức đào tạo gì?</p>
                <div>
                    <input type="checkbox" name="hinh_thuc_dao_tao" value="thac_sy" style="margin-left: 180px;"> a. Thạc sỹ
                    <input type="checkbox" name="hinh_thuc_dao_tao" value="ckI" style="margin-left: 131px;"> b. Chuyên khoa I
                    <input type="checkbox" name="hinh_thuc_dao_tao" value="nghien_cuu_sinh" style="margin-left: 82px;"> c. Nghiên
                    cứu sinh
                </div>
                <div>
                    <input type="checkbox" name="hinh_thuc_dao_tao" value="ckII" style="margin-left: 180px;"> d. Chuyên khoa II
                    <input type="checkbox" name="hinh_thuc_dao_tao" value="du_hoc_nuoc_ngoai" style="margin-left: 77px;"> e. Du học
                    nước
                    ngoài
                    <input type="checkbox" name="hinh_thuc_dao_tao" value="khac" style="margin-left: 50px;"> f. Khác
                </div>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 4. Anh (chị) mong muốn thời hạn ký kết
                    hợp đồng như thế nào nếu được tuyển dụng vào làm việc tại Công ty?</p><br>
                <div>
                    <input type="radio" name="thoi_han_hop_dong" value="7_nam" style="margin-left: 180px;"> a. 7 năm
                    <input type="radio" name="thoi_han_hop_dong" value="15_nam" style="margin-left: 180px;"> c. 15 năm
                    <input type="radio" name="thoi_han_hop_dong" value="20_nam" style="margin-left: 180px;"> e. 20 năm
                    <input type="radio" name="thoi_han_hop_dong" value="30_nam" style="margin-left: 180px;"> g. 30 năm
                </div>
                <div>
                    <input type="radio" name="thoi_han_hop_dong" value="12_nam" style="margin-left: 180px;"> b. 12 năm
                    <input type="radio" name="thoi_han_hop_dong" value="17_nam" style="margin-left: 170px;"> d. 17 năm
                    <input type="radio" name="thoi_han_hop_dong" value="25_nam" style="margin-left: 178px;"> f. 25 năm
                    <input type="radio" name="thoi_han_hop_dong" value="khac" style="margin-left: 184px;"> h. Khác
                </div>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 5.Anh(chị) có nguyện vọng làm việc vào vị
                    trí nào tại Công ty (*)</p><br>
                <i style="margin-left: 220px;">- Đánh số theo thứ tự ưu tiên (1,2,3)</i> <br>
                <i style="margin-left: 220px;">- Một người được ứng tuyển 3 vị trí.</i>
                <div>
                    <input type="checkbox" name="ung_tuyen" value="noi_tong_hop"style="margin-left: 180px;"> Nội tổng hợp
                    <input type="checkbox" name="ung_tuyen" value="ngoai_tong_hop" style="margin-left: 113px;"> Ngoại tổng
                    hợp
                    <input type="checkbox" name="ung_tuyen" value="san_phu" style="margin-left: 65px;"> Sản phụ
                    <input type="checkbox" name="ung_tuyen" value="chan_doan_hinh_anh" style="margin-left: 146px;"> Chẩn
                    đoán hình ảnh
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen" value="noi_tim_mach" style="margin-left: 180px;"> Nội tim mạch
                    <input type="checkbox" name="ung_tuyen" value="ngoai_than_kinh" style="margin-left: 113px;"> Ngoại thần
                    kinh
                    <input type="checkbox" name="ung_tuyen" value="nhi" style="margin-left: 65px;"> Nhi
                    <input type="checkbox" name="ung_tuyen" value="xn_tham_do_chuc_nang" style="margin-left: 178px;"> XN-
                    Thăm dò chức năng
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen" value="noi_than_kinh" style="margin-left: 180px;"> Nội thần
                    kinh
                    <input type="checkbox" name="ung_tuyen" value="chan_thuong_chinh_hinh" style="margin-left: 112px;">
                    Chấn thương chỉnh hình
                    <input type="checkbox" name="ung_tuyen" value="yhct" style="margin-left: 8px;"> Y học cổ truyền
                    <input type="checkbox" name="ung_tuyen" value="giai_phau" style="margin-left: 93px;"> Giải phẫu bệnh
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen" value="ptthtm" style="margin-left: 180px;"> Phẫu thuật tạo
                    hình thẩm mỹ
                    <input type="checkbox" name="ung_tuyen" value="rhm" style="margin-left: 2px;"> Răng hàm mặt
                    <input type="checkbox" name="ung_tuyen" value="phcn" style="margin-left: 75px;"> Phục hồi chức năng
                    <input type="checkbox" name="ung_tuyen" value="ub_yhhn" style="margin-left: 65px;"> U bướu - y học hạt
                    nhân
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen" value="da_lieu" style="margin-left: 180px;"> Da liễu
                    <input type="checkbox" name="ung_tuyen" value="tmh" style="margin-left: 158px;"> Tai mũi họng
                    <input type="checkbox" name="ung_tuyen" value="gay_me" style="margin-left: 88px;"> Gây mê
                    <input type="checkbox" name="ung_tuyen" value="hscc" style="margin-left: 151px;"> Hồi sức cấp cứu
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen" value="bnd" style="margin-left: 180px;"> Bệnh nhiệt
                    đới(truyền nhiễm)
                    <input type="checkbox" name="ung_tuyen" value="mat" style="margin-left: 1px;"> Mắt
                    <input type="checkbox" name="ung_tuyen" value="dinh_duong" style="margin-left: 151px;"> Dinh dưỡng
                    <input type="checkbox" name="ung_tuyen" value="cvkhth" style="margin-left: 120px;"> Chuyên viên kế
                    hoạch tổng hợp
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen" value="nt" style="margin-left: 180px;"> Nội tiết
                    <input type="checkbox" name="ung_tuyen" value="cnk" style="margin-left: 154px;"> Chống nhiễm khuẩn
                    <input type="checkbox" name="ung_tuyen" value="ksclbv" style="margin-left: 37px;"> Kiểm soát chất
                    lượng BV
                    <input type="checkbox" name="ung_tuyen" value="cvthcskh" style="margin-left: 31px;"> Chuyên viên Truyền
                    thông CSKH
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen" value="khac" style="margin-left: 180px;"> Khác
                </div>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 6.Anh(chị) mong muốn công tác tại bệnh
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
                    <input type="checkbox" name="bv_da_khoa_tth_quang_binh" value="yes" style="margin-left: 136px;">
                    f.Bệnh viện Đa khoa TTH Quảng Bình
                </div>
                <div>
                    <input type="checkbox" name="bv_yhct_phcn_hung_dong" value="yes"style="margin-left: 180px;">
                    c.Bệnh viện Đa khoa TTH Hưng Đông
                    <input type="checkbox" name="bv_da_khoa_tth_quang_tri" value="yes" style="margin-left: 88px;">
                    h.Bệnh viện Đa khoa TTH Quảng Trị
                </div>
                <div>
                    <input type="checkbox" name="bv_da_khoa_tth_ha_tinh" value="yes"style="margin-left: 180px;">
                    d.Bệnh viện Đa khoa TTH Hà Tĩnh
                </div>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 7.Anh(chị) biết thông tin tuyển dụng của
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
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 8.Điểm yếu?</p><br>
                <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="content"></textarea>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 9.Điểm mạnh?</p><br>
                <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="content"></textarea>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 10.Mức lương mong muốn của anh(chị) khi
                    vào làm việc tại công ty?</p><br>
                <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="content"></textarea>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 11.Anh(chị) có kiến nghị, đề xuất hoặc
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
                            BÁC SỸ
                          </h5> <br>
                          <i style="margin-left: 175px;">(Ký,ghi rõ họ tên)</i>
                      </div> 
                    </div>
                  </div>
            </form>

        </div><!-- /.container-fluid -->
    </div>
@stop
