@extends('adminlte.Layout.app' )

@section('metadata')
@stop

@section('styles')

@stop

@section('scripts')
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
            <div class="col-5">
              <b class="tieu_de"><u>CÔNG
                  TY/BỆNH VIỆN</u></b><input class="input" style=" width: 80px;"
                placeholder=".........................."> <br>
              <br>
              <p style="display: inline; margin-left: 25px;">Số: </p><input class="input"
                style=" width: 40px;" placeholder="....................">/TB-TTH
              <input class="input" style="width: 20px;" placeholder="............">
            </div>

            <div class="col-7 ">
              <h5 class="tieu_de" style="margin-left: 70px;">
                CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h5>
              <h6 class="tieu_de" style="margin-left: 180px;">Độc
                lập- tự do - hạnh phúc</h6>
              <p style="margin-left: 155px;">-----------------------------------------------</p>

              <div style="text-align: right;"><input class="input" style="width: 60px;"
                  placeholder="..............">,<i>ngày</i><input class="input" style=" width: 20px;"
                  placeholder="...."><i>tháng</i><input class="input" style="width: 20px;"
                  placeholder="...."><i>năm</i><input class="input" style="width: 40px;"
                  placeholder="........"></div>
            </div>
          </div>
        </div>
        <br>
        <h5 class="tieu_de" style="margin-left: 500px;">THÔNG BÁO</h5>
        <h6 class="tieu_de" style="margin-left: 380px;">V/v Tiếp nhận
          nhân sự Đào tạo/Học việc/Thử việc</h6>
        <br>
        <i class="noi_dung">- Xét nhu cầu nhân sự cho Khoa/Phòng <input class="input"
            style="width: 90px;" placeholder="................................"></i> <br>
        <i class="noi_dung">- Xét khả năng, năng lực của nhân sự,</i> <br>
        <p class="noi_dung">Công ty/ Bệnh viện
          <input class="input" style=" width: 40px;" placeholder="....................">
          thông báo tiếp nhận Đào tạo/Học việc/Thử việc đối với nhân sự sau:
        </p> <br> <br>
        <p class="noi_dung">- Họ và tên: </p>
        <input class="input" style="width: 550px;"
          placeholder=".....................................................................................................................................................................">
        <br>
        <br>
        <p class="noi_dung">- Ngày sinh: </p>
        <input class="input" style="width: 548px;"
          placeholder=".....................................................................................................................................................................">
        <br>
        <br>
        <p class="noi_dung">- CMND số: </p>
        <input class="input" style="width: 150px;"
          placeholder="......................................................">; Ngày cấp:
        <input class="input" style="width: 150px;"
          placeholder="......................................................">; Tại:
        <input class="input" style=" width: 145px;"
          placeholder="......................................................">
        <br>
        <br>
        <p class="noi_dung">- Trình độ chuyên môn: </p>
        <input type="text" class="input" style=" width: 475px;"
          placeholder=".....................................................................................................................................................................">
        <br>
        <br>
        <p class="noi_dung">- Vị trí Đào tạo/Học việc/Thử việc: </p>
        <input type="text" class="input" style=" width: 406px;"
          placeholder=".....................................................................................................................................................................">
        <br>
        <br>
        <p class="noi_dung">- Thời gian tiếp nhận Đào tạo/Học việc/Thử việc: Từ ngày
        </p>
        <input class="input" style="width: 92px;" placeholder="........................"> đến ngày
        <input class="input" style="width: 92px;" placeholder="........................">
        <br>
        <p class="noi_dung">Ông/Bà</p>
        <input class="input" type="text" style="width: 92px;"  placeholder="........................"> và Trưởng Khoa/Phòng <input class="input" type="text" style="width: 92px;" placeholder="........................">
        có trách nhiệm chỉ đạo , hướng dẫn
        <br>
        <p class="noi_dung">và đánh giá kết quả Đào tạo/Học việc/Thử việc theo quy định tại Quy trình tuyển dụng lao động</p> <br>
        <p class="noi_dung">cho Ông/bà</p>
        <input class="input" type="text" style="width: 92px;" placeholder="........................"> trong thời gian trên.
        <br>
        <br>
        <div class="container">
          <div class="row">
            <div class="col-5">
              <i style="margin-left: 200px;"><b>Nơi nhận: </b></i>
              <p style="margin-left: 200px;"> - Như trên;</p>
              <p style="margin-left: 200px;"> - Lưu VT,P.NS</p>
            </div>
            <div class="col-7 ">
              <h6 style="margin-left: 150px;font-weight: 600;font-family: 'Times New Roman', Times, serif;">TỔNG GIÁM ĐỐC/GIÁM ĐỐC</h6>
            </div>
          </div>
        </div>
      </form>

    </div><!-- /.container-fluid -->
  </div>
@stop


