@extends('adminlte.Layout.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center fw-bold" style="background-color: blue ;color: white">THÔNG TIN NHÂN VIÊN</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-5 col-sm-2">
            <div class="nav flex-column nav-pills h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
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
                                <label for="ho_ten">Họ và tên<span style="color: red">*</span>:</label>
                                <div class="input-group">
                                    <input type="text" id="name" class="form-control" name="name"
                                        placeholder="Nhập họ và tên...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="gioi_tinh">Giới tính<span style="color: red">*</span>: </label>
                                <select id="gioi_tinh" class="form-control">
                                    <option selected>Nam</option>
                                    <option>Nữ</option>
                                    <option>LGBT</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="ngay_sinh" class="h6">Ngày sinh<span style="color: red">*</span>:</label>
                                <input type="date" id="ngay_sinh" class="form-control" name="ngay_sinh">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="email">Email:</label>
                                <div class="input-group mb-3">
                                    <input type="email" id="email" class="form-control" name="email"
                                        placeholder="Nhập email...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="dien_thoai" class="h6">Điện thoại<span
                                        style="color: red">*</span>:</label>
                                <div class="input-group">
                                    <input type="text" id="dien_thoai" class="form-control" name="dien_thoai"
                                        placeholder="Nhập sô diện thoại...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="loai_ho_so">Loại hồ sơ<span style="color: red">*</span>: </label>
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
                                    <input type="text" id="que_quan" class="form-control" name="que_quan"
                                        placeholder="Nhập quê quán...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-house"></i></span>
                                    </div>
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
                                    <input type="text" id="ton_giao" class="form-control" name="ton_giao"
                                        placeholder="Nhập tôn giáo...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="dia_chi_thuong_tru">Địa chỉ thường trú<span
                                        style="color: red">*</span>:</label>
                                <div class="input-group">
                                    <input type="text" id="dia_chi_thuong_tru" class="form-control"
                                        name="dia_chi_thuong_tru" placeholder="Nhập địa chỉ thường trú...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-house-door-fill"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dia_chi_tam_tru" class="h6">Địa chỉ tạm trú:</label>
                                <div class="input-group">
                                    <input type="text" id="dia_chi_tam_tru" class="form-control"
                                        name="dia_chi_tam_tru" placeholder="Nhập địa chỉ tạm trú...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-house"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="ma_so_thue">Mã số thuế:</label>
                                <div class="input-group">
                                    <input type="text" id="ma_so_thue" class="form-control" name="ma_so_thue"
                                        placeholder="Nhập mã số thuế...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-upc"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="dien_thoai_cong_viec" class="h6">Điện thoại công việc:</label>
                                <div class="input-group">
                                    <input type="text" id="dien_thoai_cong_viec" class="form-control"
                                        name="dien_thoai_cong_viec" placeholder="Nhập số điện hoại công việc...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-telephone-plus"></i></span>
                                    </div>
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
                                    <input type="text" id="email_phu" class="form-control" name="email_phu"
                                        placeholder="Nhập email phụ...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="ngay_bat_dau_lam_viec" class="h6">Ngày bắt đầu làm việc<span
                                        style="color: red">*</span>:</label>
                                <input type="date" id="ngay_bat_dau_lam_viec" class="form-control"
                                    name="ngay_bat_dau_lam_viec">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ngay_ket_thuc_lam_viec" class="h6">Ngày kết thúc làm việc:</label>
                                <input type="date" id="ngay_ket_thuc_lam_viec" class="form-control"
                                    name="ngay_ket_thuc_lam_viec">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ngay_thuc_te_lam_viec" class="h6">Ngày thực tế làm việc:</label>
                                <input type="date" id="ngay_thuc_te_lam_viec" class="form-control"
                                    name="ngay_thuc_te_lam_viec">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="CMND" class="h6">CMND <span style="color: red">*</span>: </label>
                                <div class="input-group">
                                    <input type="text" id="CMND" class="form-control" name="CMND"
                                        placeholder="Nhập số CMND...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-credit-card"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="ngay_cap_CMND" class="h6">Ngày cấp<span style="color: red">*</span>:
                                </label>
                                <input type="date" id="ngay_cap_CMND" class="form-control" name="ngay_cap_CMND">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="noi_cap_CMND" class="h6">Nơi cấp<span style="color: red">*</span>:
                                </label>
                                <div class="input-group">
                                    <input type="text" id="noi_cap_CMND" class="form-control" name="noi_cap_CMND"
                                        placeholder="Nhập nơi cấp CMND...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="trinh_do_chuyen_mon">Trình độ chuyên môn<span style="color: red">*</span>:
                                </label>
                                <select id="trinh_do_chuyen_mon" class="form-control">
                                    <option selected>ĐH - Đại Học</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="so_cchn" class="h6">Số CCHN: </label>
                                <div class="input-group">
                                    <input type="text" id="so_cchn" class="form-control" name="so_cchn"
                                        placeholder="Nhập số CCHN...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="bo_sung_HĐ_CM" class="h6">Bổ sung phạm vi HĐ CM: </label>
                                <div class="input-group">
                                    <input type="text" id="bo_sung_HĐ_CM" class="form-control" name="bo_sung_HĐ_CM"
                                        placeholder="Nhập bổ sung phạm vi HĐ CM...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-map"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="ngay_cap_CCHN" class="h6">Ngày cấp CCHN: </label>
                                <input type="date" id="ngay_cap_CCHN" class="form-control" name="ngay_cap_CCHN">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="dk_hanh_nghe_tai" class="h6">ĐK Hành nghề tại: </label>
                                <div class="input-group">
                                    <input type="text" id="dk_hanh_nghe_tai" class="form-control"
                                        name="dk_hanh_nghe_tai" placeholder="Nhập nơi ĐK hành nghề...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="bien_xe_o_to" class="h6">Biển xe ô tô<span style="color: red">*</span>:
                                </label>
                                <div class="input-group">
                                    <input type="text" id="bien_xe_o_to" class="form-control" name="bien_xe_o_to"
                                        placeholder="Nhập biển số xe ô tô...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor"
                                                class="bi bi-car-front-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z" />
                                            </svg></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="bien_xe_may" class="h6">Biển xe máy<span
                                        style="color: red">*</span>:</label>
                                <div class="input-group">
                                    <input type="text" id="bien_xe_may" class="form-control" name="bien_xe_may"
                                        placeholder="Nhập biển số xe máy...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-bicycle"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="size_quan">Size quần<span style="color: red">*</span>:</label>
                                <div class="input-group">
                                    <input type="text" id="size_quan" class="form-control" name="size_quan"
                                        placeholder="Nhập size quần...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-list-ol"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="size_ao" class="h6">Size áo<span style="color: red">*</span>:</label>
                                <div class="input-group">
                                    <input type="text" id="size_ao" class="form-control" name="size_ao"
                                        placeholder="Nhập size áo...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-list-ol"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="size_giay_dep" class="h6">Size giày dép<span
                                        style="color: red">*</span>:</label>
                                <div class="input-group">
                                    <input type="text" id="size_giay_dep" class="form-control" name="size_giay_dep"
                                        placeholder="Nhập size giày dép...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-list-ol"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="bang_lai" class="h6">Bằng lái:</label>
                                <div class="input-group">
                                    <input type="text" id="bang_lai" class="form-control" name="bang_lai"
                                        placeholder="Nhập bằng lái...">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-credit-card"></i></span>
                                    </div>
                                </div>
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
