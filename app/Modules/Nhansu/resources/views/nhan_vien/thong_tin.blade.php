@extends('adminlte.Layout.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center fw-bold" style="background-color: blue ;color: white">THÔNG TIN NHÂN VIÊN</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-5 col-sm-2">
            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="thong-tin-chung-tab" data-toggle="pill" href="#thong-tin-chung"
                    role="tab" aria-controls="thong-tin-chung" aria-selected="true">THÔNG TIN CHUNG </a>

                <a class="nav-link" id="ho-so-nhan-su-tab" data-toggle="pill" href="#ho-so-nhan-su" role="tab"
                    aria-controls="ho-so-nhan-su" aria-selected="false">HỒ SƠ NHÂN SỰ</a>

                <a class="nav-link" id="hop-dong-tab" data-toggle="pill" href="#hop-dong" role="tab"
                    aria-controls="hop-dong" aria-selected="false">HỢP ĐỒNG</a>

                <a class="nav-link" id="luong-tab" data-toggle="pill" href="#luong" role="tab" aria-controls="luong"
                    aria-selected="false">LƯƠNG</a>

                <a class="nav-link" id="bao-hiem-tab" data-toggle="pill" href="#bao-hiem" role="tab"
                    aria-controls="bao-hiem" aria-selected="false">BẢO HIỂM</a>

                <a class="nav-link" id="cong-tac-tab" data-toggle="pill" href="#cong-tac" role="tab"
                    aria-controls="cong-tac" aria-selected="false">CÔNG TÁC</a>

                <a class="nav-link" id="dao-tao-tab" data-toggle="pill" href="#dao-tao" role="tab"
                    aria-controls="dao-tao" aria-selected="false">ĐÀO TẠO</a>

                <a class="nav-link" id="boi-duong-tab" data-toggle="pill" href="#boi-duong" role="tab"
                    aria-controls="boi-duong" aria-selected="false">BỒI DƯỠNG</a>

                <a class="nav-link" id="khen-thuong-ky-luat-tab" data-toggle="pill" href="#khen-thuong-ky-luat"
                    role="tab" aria-controls="khen-thuong-ky-luat" aria-selected="false">KHEN THƯỞNG - KỶ LUẬT</a>

                <a class="nav-link" id="gia-dinh-tab" data-toggle="pill" href="#gia-dinh" role="tab"
                    aria-controls="gia-dinh" aria-selected="false">GIA ĐÌNH</a>

                <a class="nav-link" id="tai-san-tab" data-toggle="pill" href="#tai-san" role="tab"
                    aria-controls="tai-san" aria-selected="false">TÀI SẢN</a>

                <a class="nav-link" id="tao-tai-khoan-tab" data-toggle="pill" href="#tao-tai-khoan" role="tab"
                    aria-controls="tao-tai-khoan" aria-selected="false">TẠO TÀI KHOẢN</a>
            </div>
        </div>
        <div class="col-7 col-sm-10">
            <div class="tab-content" id="vert-tabs-tabContent">
                <div class="tab-pane text-left fade active show" id="thong-tin-chung" role="tabpanel"
                    aria-labelledby="thong-tin-chung-tab">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="ho_ten">Họ và tên:</label>
                                <div class="input-group">
                                    <input type="text" id="name" class="form-control" name="name">
                                    <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="gioi_tinh">Giới tính: </label>
                                <select id="gioi_tinh" class="form-control">
                                    <option selected>Nam</option>
                                    <option>Nữ</option>
                                    <option>LGBT</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="ngay_sinh" class="h6">Ngày sinh:</label>
                                <input type="date" id="ngay_sinh" class="form-control" name="ngay_sinh">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email:</label>
                                <div class="input-group">
                                    <input type="email" id="email" class="form-control" name="email">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="dien_thoai" class="h6">Điện thoại:</label>
                                <div class="input-group">
                                    <input type="text" id="dien_thoai" class="form-control" name="dien_thoai">
                                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="loai_ho_so">Loại hồ sơ: </label>
                                <select id="loai_ho_so" class="form-control">
                                    <option selected>Chính thức</option>
                                    <option>...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="que_quan">Quê quán:</label>
                                <div class="input-group">
                                    <input type="text" id="que_quan" class="form-control" name="que_quan">
                                    <span class="input-group-text"><i class="bi bi-house"></i></span>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="dan_toc">Dân tộc: </label>
                                <select id="dan_toc" class="form-control">
                                    <option selected>Kinh</option>
                                    <option>...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="ton_giao" class="h6">Tôn giáo:</label>
                                <div class="input-group">
                                    <input type="text" id="ton_giao" class="form-control" name="ton_giao">
                                    <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="dia_chi_thuong_tru">Địa chỉ thường trú:</label>
                                <div class="input-group">
                                    <input type="text" id="dia_chi_thuong_tru" class="form-control"
                                        name="dia_chi_thuong_tru">
                                    <span class="input-group-text"><i class="bi bi-house-door-fill"></i></span>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dia_chi_tam_tru" class="h6">Địa chỉ tạm trú:</label>
                                <div class="input-group">
                                    <input type="text" id="dia_chi_tam_tru" class="form-control"
                                        name="dia_chi_tam_tru">
                                    <span class="input-group-text"><i class="bi bi-house"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="ma_so_thue">Mã số thuế:</label>
                                <div class="input-group">
                                    <input type="text" id="ma_so_thue" class="form-control" name="ma_so_thue">
                                    <span class="input-group-text"><i class="bi bi-upc"></i></span>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="dien_thoai_cong_viec" class="h6">Điện thoại công việc:</label>
                                <div class="input-group">
                                    <input type="text" id="dien_thoai_cong_viec" class="form-control"
                                        name="dien_thoai_cong_viec">
                                    <span class="input-group-text"><i class="bi bi-telephone-plus"></i></span>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="hon_nhan">Tình trạng hôn nhân: </label>
                                <select id="hon_nhan" class="form-control">
                                    <option selected>Đã kết hôn</option>
                                    <option>Chưa kết hôn</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="email_phu" class="h6">Email phụ:</label>
                                <div class="input-group">
                                    <input type="text" id="email_phu" class="form-control" name="email_phu">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="ngay_bat_dau_lam_viec" class="h6">Ngày bắt đầu làm việc:</label>
                                <input type="date" id="ngay_bat_dau_lam_viec" class="form-control" name="ngay_bat_dau_lam_viec">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ngay_ket_thuc_lam_viec" class="h6">Ngày kết thúc làm việc:</label>
                                <input type="date" id="ngay_ket_thuc_lam_viec" class="form-control" name="ngay_ket_thuc_lam_viec">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ngay_thuc_te_lam_viec" class="h6">Ngày thực tế làm việc:</label>
                                <input type="date" id="ngay_thuc_te_lam_viec" class="form-control" name="ngay_thuc_te_lam_viec">
                            </div>
                        </div>
                    </form>
                </div>

            <div class="tab-pane fade " id="ho-so-nhan-su" role="tabpanel" aria-labelledby="ho-so-nhan-su-tab">
                Hồ sơ nhân sự
            </div>
            <div class="tab-pane fade" id="hop-dong" role="tabpanel" aria-labelledby="hop-dong-tab">
                Hợp đồng
            </div>
            <div class="tab-pane fade" id="luong" role="tabpanel" aria-labelledby="luong-tab">
                Lương
            </div>
            <div class="tab-pane fade" id="bao-hiem" role="tabpanel" aria-labelledby="bao-hiem-tab">
                Bảo hiểm
            </div>
            <div class="tab-pane fade" id="cong-tac" role="tabpanel" aria-labelledby="cong-tac-tab">
                Công tác
            </div>
            <div class="tab-pane fade" id="dao-tao" role="tabpanel" aria-labelledby="dao-tao-tab">
                Đào tạo
            </div>
            <div class="tab-pane fade" id="boi-duong" role="tabpanel" aria-labelledby="boi-duong-tab">
                Bồi dưỡng
            </div>
            <div class="tab-pane fade" id="khen-thuong-ky-luat" role="tabpanel"
                aria-labelledby="khen-thuong-ky-luat-tab">
                Khen thưởng - kỷ luật
            </div>
            <div class="tab-pane fade" id="gia-dinh" role="tabpanel" aria-labelledby="gia-dinh-tab">
                Gia đình
            </div>
            <div class="tab-pane fade" id="tai-san" role="tabpanel" aria-labelledby="tai-san-tab">
                Tài sản
            </div>
            <div class="tab-pane fade" id="tao-tai-khoan" role="tabpanel" aria-labelledby="tao-tai-khoan-tab">
                Tạo tài khoản
            </div>
        </div>
    </div>
    </div>
@stop
