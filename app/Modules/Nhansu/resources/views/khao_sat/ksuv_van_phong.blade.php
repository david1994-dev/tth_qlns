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
                                    style="width: 40px;" placeholder="........"></div>
                            <h4 class="tieu_de" style="margin-left: 70px;">
                                PHIẾU
                                KHẢO SÁT ỨNG VIÊN</h4>
                            <i style="margin-left: 70px;">(Đối tượng áp dụng: vị trí Văn phòng)</i>
                            <p style="margin-left: 70px;font-weight: 600;"> Vị trí ứng tuyển: <input
                                    class="input" 
                                    style=" width: 300px;"
                                    placeholder="................................................................................................................................................">
                        </div>

                    </div>
                </div>
                <br>
                <p style="margin-left: 220px;">Để phục vụ cho công tác tuyển dụng cán bộ-nhân viên vào làm việc tại Công ty
                    và các chi nhánh</p>
                <p style="margin-left: 220px;">Kính đề nghị ứng viên trả lời 1 số câu hỏi khảo sát sau:</p>
                <div style="margin-left: 220px;">
                    <p style="display: inline;">Họ và tên:</p> <input class="input"  style="width: 350px;"
                        placeholder="..............................................................................................">
                    Ngày sinh: <input class="input"  style="width: 160px;"
                        placeholder="..................................................."> <br>
                    <p style="display: inline;">Địa chỉ:</p> <input class="input"  style="width: 602px;"
                        placeholder="......................................................................................................................................................."><br>
                    <p style="display: inline;">Điện thoại:</p> <input class="input"  style="width: 300px;"
                        placeholder="......................................................................"> Email: <input class="input" 
                        style=" width: 232px;"
                        placeholder="................................................................."><br>
                    <p style="display: inline;">Trường đào tạo:</p> <input class="input"  style="width: 546px;"
                        placeholder="..........................................................................................................................................">
                    <br>
                    <p style="display: inline;">Chuyên ngành đào tạo:</p> <input class="input"  style="width: 300px;"
                        placeholder="......................................................................"> Hệ đào tạo:
                    <input class="input"  style="width: 115px;" placeholder="..................................."><br>
                    <p style="display: inline;">Tốt nghiệp loại:</p>
                    <input type="radio" name="loai_tot_nghiep" value="gioi"> Giỏi
                    <input type="radio" name="loai_tot_nghiep" value="kha"> Khá
                    <input type="radio" name="loai_tot_nghiep" value="tbkha"> TB Khá
                    <input type="radio" name="loai_tot_nghiep" value="trung_binh"> Trung bình <br>
                    <p style="display: inline;">Loại hình đào tạo: </p>
                    <input type="radio" name="loai_hinh_dao_tao" value="chinh_quy"> Chính quy
                    <input type="radio" name="loai_hinh_dao_tao" value="chuyen_tu"> Liên thông/vừa học vừa làm <br>

                    <p style="display: inline;">Chiều cao:</p> <input class="input"  style="width: 300px;"
                        placeholder="......................................................................"> Cân nặng:
                    <input class="input"  style="width: 210px;"
                        placeholder="........................................................."><br>
                    <p style="display: inline;">Tình trạng hôn nhân: </p>
                    <input type="radio" name="hon_nhan" value="doc_than"> Độc thân
                    <input type="radio" name="hon_nhan" value="da_co_gia_dinh"> Đã có gia đình
                    <p style="display: inline; margin-left: 100px;">Số con: </p> <input class="input"  style="width: 168px;"
                        placeholder="......................................................................"><br>
                </div>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 1.Quá trình công tác:</p> <i>(Dành cho
                    những người đã có kinh nghiệm công tác)</i> <br>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 2.Anh(chị) có khả năng(Thời gian, kinh tế,
                    ...) để tiếp tục học các lớp nâng cao nghiệp vụ không?</p><br>
                <input type="radio" name="hoc_lop_nang_cao" value="co" style="margin-left: 180px;"> a. Có
                <input type="radio" name="hoc_lop_nang_cao" value="khong" style="margin-left: 180px;"> b. Không <br>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 3.Anh(chị) biết thông tin tuyển dụng của
                    Công ty qua kênh nào?</p><br>
                <div>
                    <input type="checkbox" name="nguoi_than_gioi_thieu" value="yes" style="margin-left: 180px;"> Người
                    thân
                    giới thiệu
                    <input type="checkbox" name="facebook" value="yes" style="margin-left: 85px;"> Facebook
                    <input type="checkbox" name="bao_chi_truyen_hinh" value="yes" style="margin-left: 82px;"> Báo
                    chí/ Truyền
                    hình
                </div>
                <div>
                    <input type="checkbox" name="web_fanpage" value="yes" style="margin-left: 180px;"> Web/fanpage
                    Công ty
                    <input type="checkbox" name="vietnamwork" value="yes" style="margin-left: 82px;"> Vietnamwork
                    <input type="checkbox" name="nguon_khac" value="yes" style="margin-left: 57px;"> Nguồn khác
                </div>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 4.Anh(chị) đồng ý chuyển vị trí công việc
                    (nếu đạt PV) qua vị trí nào sau đây? </p><br>
                <i style="margin-left: 220px;">- Đánh dấu 3 vị trí theo thứ tự ưu tiên </i>
                <div>
                    <input type="checkbox" name="ung_tuyen" value="nvkd" style="margin-left: 180px;"> Nhân viên kinh
                    doanh
                    <input type="checkbox" name="ung_tuyen" value="nvtk" style="margin-left: 35px;"> NV Thiết kế
                    <input type="checkbox" name="ung_tuyen" value="nvtt" style="margin-left: 50px;"> Nhân viên truyền
                    thông
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen" value="nvhc" style="margin-left: 180px;"> Nhân viên hành
                    chính
                    <input type="checkbox" name="ung_tuyen" value="nvcskh" style="margin-left: 36px;"> Nhân viên CSKH
                    <input type="checkbox" name="ung_tuyen" value="nvqtw" style="margin-left: 17px;"> Nhân viên quản trị
                    web
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen" value="nvtvpttm" style="margin-left: 180px;"> NV Tư vấn PTTM
                    <input type="checkbox" name="ung_tuyen" value="cvns" style="margin-left: 72px;"> CV Nhân sự
                    <input type="checkbox" name="ung_tuyen" value="nvdn" style="margin-left: 50px;"> NV Điện nước
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen" value="nvtn_lt" style="margin-left: 180px;"> NV Thu ngân - Lễ
                    tân
                    <input type="checkbox" name="ung_tuyen" value="nvvt" style="margin-left: 39px;"> NV Văn thư
                    <input type="checkbox" name="ung_tuyen" value="nvkh" style="margin-left: 53px;"> NV Kế hoạch
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen" value="nvkt" style="margin-left: 180px;"> NV Kế toán
                    <input type="checkbox" name="ung_tuyen" value="nvlx" style="margin-left: 110px;"> NV Lái xe
                    <input type="checkbox" name="ung_tuyen" value="nvtkpm" style="margin-left: 67px;"> NV Thiết kế phần
                    mềm
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen" value="nvpc" style="margin-left: 180px;"> NV Pháp chế
                    <input type="checkbox" name="ung_tuyen" value="nvbv" style="margin-left: 99px;"> NV Bảo vệ
                    <input type="checkbox" name="ung_tuyen" value="nvqlda" style="margin-left: 61px;"> NV Quản lý dự án
                </div>
                <div>
                    <input type="checkbox" name="ung_tuyen" value="khac" style="margin-left: 180px;"> Khác
                    <input type="checkbox" name="ung_tuyen" value="nvit" style="margin-left: 155px;"> NV IT
                    <input type="checkbox" name="ung_tuyen" value="nvdnvqhqt" style="margin-left: 95px;"> NV Đối ngoại và
                    quan hệ QT
                </div>

                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 5.Điểm yếu?</p><br>
                <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="content"></textarea>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 6.Điểm mạnh?</p><br>
                <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="content"></textarea>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 7.Mục tiêu ngắn hạn/dài hạn của anh(chị)
                    là gì?</p><br>
                <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="content"></textarea>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 8.Mức lương mong muốn của anh(chị) khi
                    vào
                    làm việc tại công ty?</p><br>
                <textarea style="margin-left: 180px; width: 800px; height: 100px;" cols="30" rows="10" name="content"></textarea>
                <p style="margin-left: 180px;font-weight: 600; display: inline;"> 9.Anh(chị) có kiến nghị, đề xuất hoặc
                    thắc
                    mắc muốn Công ty giải đáp không?</p><br>
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
