<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KHẢO SÁT ỨNG VIÊN</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<body class="hold-transition sidebar-mini">
    <div class="content">
        <div class="container-fluid ">

            <div class="card-deck">
                <div class="card">
                  <img src="https://benhvientthhatinh.vn/uploads/images/4f844eeabe37551156f5cd16c9db276c.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Khảo sát ứng viên Bác Sỹ</h5>
                    <p class="card-text">Biểu mẫu khảo sát cho Bác Sỹ ứng tuyển vào công ty</p>
                  </div>
                  <a href="{{ route('nhansu.viewKhaoSat', ['type' => 'bac-si']) }}" class="btn btn-primary">Khảo sát ngay</a>
                  <div class="card-footer">
                    <small class="text-muted">TTH: Vì sức khỏe và nụ cười của bạn</small>
                  </div>
                </div>
                <div class="card">
                  <img src="https://benhvientthhatinh.vn/uploads/images/bs-nhung.jpg" width="600px" height="750px" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Khảo sát ứng viên Dược sỹ/KTV/ Điều dưỡng</h5>
                    <p class="card-text">Biểu mẫu khảo sát cho Dược Sỹ/KTV/ Điều dưỡng ứng tuyển vào công ty</p>
                  </div>
                  <a href="{{ route('nhansu.viewKhaoSat', ['type' => 'duoc-si']) }}" class="btn btn-primary">Khảo sát
                    ngay</a>
                  <div class="card-footer">
                    <small class="text-muted">TTH: Vì sức khỏe và nụ cười của bạn</small>
                  </div>
                </div>
                <div class="card">
                  <img style="object-fit: cover;" src="https://www.tthgroup.vn/public/img/images/1c0ad0b2f36c3f32667d.jpg" class="card-img-top" alt="..." width="600px" height="750px">
                  <div class="card-body">
                    <h5 class="card-title">Khảo sát ứng viên văn phòng</h5>
                    <p class="card-text">Biểu mẫu khảo sát ứng viên ứng tuyển vào vị trí nhân viên văn phòng</p>
                  </div>
                  <a href="{{ route('nhansu.viewKhaoSat', ['type' => 'van-phong']) }}" class="btn btn-primary">Khảo sát
                    ngay</a>
                  <div class="card-footer">
                    <small class="text-muted">TTH: Vì sức khỏe và nụ cười của bạn</small>
                  </div>
                </div>
              </div>

        </div><!-- /.container-fluid -->
    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
