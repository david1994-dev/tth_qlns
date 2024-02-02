@extends('adminlte.Layout.app')
@section('styles')
    <style>
        label {
            font-weight: 500 !important;
        }

        .placeholder1 .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 0px !important;
        }


        .select22 .select2-container .select2-selection--single {
            height: calc(2.25rem + 1px) !important;
        }

        .option .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #007bff !important;
        }

        .exit-option .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: red !important;
        }

        .select22 .select2-container .select2-selection--single {
            height: calc(2.25rem + 1px) !important;
        }
    </style>
@stop
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2()
            $('.tat-ca-chi-nhanh.select2').select2({
                placeholder: "Chọn chi nhánh... "
            })
            $('.nguoi-nhan-khoa-phong.select2').select2({
                placeholder: "Chọn khoa phòng... "
            })
            $('.nhom-nguoi-dung.select2').select2({
                placeholder: "Chọn nhóm người dùng... "
            })
            $('.nguoi-nhan-ca-nhan.select2').select2({
                placeholder: "Chọn người nhận cá nhân... "
            })
            $('.muc-do.select2').select2({
                placeholder: "Chọn mức độ... "
            })
            $('.loai-thong-bao.select2').select2({
                placeholder: "Chọn loại thông báo... "
            })
        });
    </script>
    <script src="https://cdn.tiny.cloud/1/s5czkzl43fj1mskq5fews6aaqgi3szoefx33i9biqutkvdxn/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea#tiny', // change this value according to your HTML
            plugins: [
                'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
                'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
                'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help',
                'wordcount'
            ],
        });
    </script>
@stop
@section('content')
    <div class="side-app main-container">

        <!-- PAGE HEADER -->
        <div class="page-header d-lg-flex d-block">
            <div class="page-leftheader">
                <div class="page-title">ĐĂNG THÔNG BÁO</div>
            </div>
            <div class="page-rightheader ms-md-auto">
                <div class=" btn-list">
                    <button class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                        data-bs-original-title="E-mail"> <i class="feather feather-mail"></i> </button>
                    <button class="btn btn-light" data-bs-placement="top" data-bs-toggle="tooltip" title=""
                        data-bs-original-title="Contact"> <i class="feather feather-phone-call"></i> </button>
                    <button class="btn btn-primary" data-bs-placement="top" data-bs-toggle="tooltip" title=""
                        data-bs-original-title="Info"> <i class="feather feather-info"></i> </button>
                </div>
            </div>
        </div>
        <!-- END PAGE HEADER -->

        <!-- ROW -->
        <div class="row">
            <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-5">
                                    <label class="form-label">Gửi Tất Cả Các Chi Nhánh:</label>
                                </div>
                                <div class="col-xl-7 pe-0">
                                    <label class="custom-switch">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Enable/Disable</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-5">
                                    <label class="form-label mb-0 ">Gửi Tất Cả Nhân Viên Trong Chi Nhánh:</label>
                                </div>
                                <div class="col-xl-7 select22">
                                    <select class="js-example-basic-single form-control select2 tat-ca-chi-nhanh "
                                        name="" placeholder= "abc">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-5">
                                    <label class="form-label mb-0 ">Người Nhận Khoa/Phòng:</label>
                                </div>
                                <div class="col-xl-7 ">
                                    <div class="option exit-option">
                                        <select class="js-example-basic-single form-control select2 nguoi-nhan-khoa-phong"
                                            name="" multiple>
                                            <option>Phòng cơ chế chính sách</option>
                                            <option>Phòng số hóa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-5">
                                    <label class="form-label mb-0 ">Nhóm Người Dùng:</label>
                                </div>
                                <div class="col-xl-7">
                                    <div class="option exit-option">
                                        <select class="js-example-basic-single form-control select2 nhom-nguoi-dung"
                                            name="" multiple>
                                            <option>Phòng cơ chế chính sách</option>
                                            <option>Phòng số hóa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-5">
                                    <label class="form-label mb-0 ">Người Nhận Cá Nhân:</label>
                                </div>
                                <div class="col-xl-7">
                                    <div class="option exit-option">
                                        <select class="js-example-basic-single form-control select2 nguoi-nhan-ca-nhan"
                                            name="" multiple>
                                            <option>Phòng cơ chế chính sách</option>
                                            <option>Phòng số hóa</option>
                                        </select>
                                    </div>
                                    <p class="mt-2">(*) có thể tìm bằng mã nhân viên</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-5">
                                    <label class="form-label mb-0 ">Mức Độ:</label>
                                </div>
                                <div class="col-xl-7">
                                    <select class="js-example-basic-single form-control select2 muc-do" name="">
                                        <option>Bình thường</option>
                                        <option>Khẩn</option>
                                        <option>Mật</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-5">
                                    <label class="form-label mb-0 ">Loại Thông Báo<span style="color: red">*</span>:</label>
                                </div>
                                <div class="col-xl-7">
                                    <select class="js-example-basic-single select2 loai-thong-bao form-control"
                                        name="">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-5">
                                    <label class="form-label mb-0 ">Người Theo Dõi:</label>
                                </div>
                                <div class="col-xl-7">
                                    <input type="text" class="form-control" placeholder="Nhập người theo dõi..."
                                        value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-5">
                                    <label class="form-label">Ban Hành:</label>
                                </div>
                                <div class="col-xl-7 pe-0">
                                    <label class="custom-switch">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Enable/Disable</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-8 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header border-bottom-0">
                        <h3 class="card-title">NỘI DUNG THÔNG BÁO</h3>
                    </div>
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row align-items-center">
                                    <label class="col-sm-2 form-label">Tiêu đề <span style="color: red">*</span>:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Nhập tiêu đề...">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row ">
                                    <label class="col-sm-2 form-label">Nội dung <span style="color: red">*</span>:</label>
                                    <div class="col-sm-10">
                                        <textarea id="tiny"></textarea>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="card-footer d-sm-flex">
                            <div class="mt-2 mb-2">
                            </div>
                            <div class="btn-list ms-auto">
                                <button class="btn btn-danger btn-space">Hủy bỏ</button>
                                <button type="submit" class="btn btn-primary btn-space">Đăng thông báo</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END ROW -->

    </div>
@stop
