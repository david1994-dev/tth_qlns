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
            font-size: 12px;
        }

        .exit-option .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: red !important;
        }

        .select22 .select2-container .select2-selection--single {
            height: calc(2.25rem + 1px) !important;
        }

        .placeholder2 .select2-container .select2-search--inline .select2-search__field {
            font-size: 75%;
        }

        .label-left label:not(.form-check-label):not(.custom-file-label) {
            font-size: 11px !important;
        }

        .font-placeholder .select2-container .select2-selection--single .select2-selection__rendered {
            padding-left: 0px;
            padding-right: 0px;
            font-size: 75%;
        }

        * {
            box-sizing: border-box;
        }

        div {
            &.files {
                background: #eee;
                padding: 1rem;
                margin: 1rem 0;
                border-radius: 10px;

                ul {
                    list-style: none;
                    padding: 0;
                    max-height: 150px;
                    overflow: auto;

                    li {
                        padding: 0.5rem 0;
                        padding-right: 2rem;
                        position: relative;

                        i {
                            cursor: pointer;
                            position: absolute;
                            top: 50%;
                            right: 0;
                            transform: translatey(-50%);
                        }
                    }
                }
            }

            &.container {
                width: 100%;
                padding: 0 2rem;
            }
        }

        span.file-size {
            color: #999;
            padding-left: 0.5rem;
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
            // $('.nguoi-nhan-ca-nhan.select2').select2({
            //     placeholder: "Chọn người nhận cá nhân... "
            // })
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
            images_upload_url: '{!! route('nhansu.thong-bao.uploadImage') !!}',
            file_picker_types: 'image',
            relative_urls: false,
            remove_script_host: false
        });

        let state = {};

        // state management
        function updateState(newState) {
            state = {
                ...state,
                ...newState
            };
            console.log(state);
        }

        // event handlers
        $("#upload").change(function(e) {
            let files = $("#upload")[0].files;
            let filesArr = Array.from(files);
            updateState({
                files: files,
                filesArr: filesArr
            });

            renderFileList();
        });

        $(".files").on("click", "li > i", function(e) {
            let key = $(this)
                .parent()
                .attr("key");
            let curArr = state.filesArr;
            curArr.splice(key, 1);
            updateState({
                filesArr: curArr
            });
            renderFileList();
        });

        // render functions
        function renderFileList() {
            $('.files').removeClass('d-none')
            let fileMap = state.filesArr.map((file, index) => {
                let suffix = "bytes";
                let size = file.size;
                if (size >= 1024 && size < 1024000) {
                    suffix = "KB";
                    size = Math.round(size / 1024 * 100) / 100;
                } else if (size >= 1024000) {
                    suffix = "MB";
                    size = Math.round(size / 1024000 * 100) / 100;
                }

                return `<li key="${index}">${
                    file.name
                } <span class="file-size">${size} ${suffix}</span><i class="bi bi-trash"></i></li>`;
            });
            $(".files > ul").html(fileMap);
        }
    </script>

    <script>
        $(document).ready(function() {
            $('.jsSelectNV').select2({
                ajax: {
                    url: '{!! route('nhansu.nhan-vien.searchAjax') !!}',
                    dataType: 'json',
                    delay: 300,
                    data: function(params) {
                        return query = {
                            search: params.term,
                            page: params.page
                        }
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;

                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 50) < data.count
                            }
                        };
                    },
                    cache: true
                },
                placeholder: 'Nhập mã hoặc họ tên nhân viên...',
                minimumInputLength: 1,
            })
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
        <form action="{{route('nhansu.thong-bao.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
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
                                            <input type="checkbox" name="gui_tat_ca" class="custom-switch-input"
                                                value="1">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xl-12 label-left">
                                        <label class="form-label mb-0 ">Gửi Tất Cả Nhân Viên Trong Chi Nhánh:</label>
                                    </div>
                                    <div class="col-xl-12 select22 placeholder2 font-placeholder">
                                        <div class="option exit-option">
                                            <select class="js-example-basic-single form-control select2 tat-ca-chi-nhanh"
                                                name="chi_nhanh_ids[]" multiple>
                                                @foreach ($chiNhanh as $cn)
                                                    <option value="{{ $cn->id }}">{{ $cn->ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xl-12 label-left ">
                                        <label class="form-label mb-0 ">Người Nhận Khoa/Phòng:</label>
                                    </div>
                                    <div class="col-xl-12 placeholder2">
                                        <div class="option exit-option">
                                            <select
                                                class="js-example-basic-single form-control select2 nguoi-nhan-khoa-phong"
                                                name="phong_ban_ids[]" multiple>
                                                @foreach ($phongBan as $pb)
                                                    <option value="{{ $pb->id }}">{{ $pb->ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xl-12 label-left">
                                        <label class="form-label mb-0 ">Nhóm Người Dùng:</label>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="option exit-option placeholder2">
                                            <select class="js-example-basic-single form-control select2 nhom-nguoi-dung"
                                                name="nhom_nguoi_nhan_ids[]" multiple>
                                                @foreach($nhomNguoiDung as $nnd)
                                                    <option value="{{ $nnd->id }}">{{ $nnd->ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xl-12 label-left">
                                        <label class="form-label mb-0 ">Người Nhận Cá Nhân:</label>
                                    </div>
                                    <div class="col-xl-12 placeholder2">
                                        <div class="option exit-option">
                                            <select class="js-example-basic-single form-control select2 nguoi-nhan-ca-nhan jsSelectNV"
                                                name="nguoi_nhan_ids[]" multiple>

                                            </select>
                                        </div>
                                        <p class="mt-2 label-left" style="font-size: small">(*) có thể tìm bằng mã nhân viên
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xl-12 label-left">
                                        <label class="form-label mb-0 ">Mức Độ:</label>
                                    </div>
                                    <div class="col-xl-12 placeholder2">
                                        <select class="js-example-basic-single form-control select2 muc-do" name="muc_do">
                                            @foreach(\App\Modules\Nhansu\src\Models\ThongBao::MUC_DO as $mucDo)
                                                <option value="{{$mucDo['id']}}">{{$mucDo['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xl-12 label-left">
                                        <label class="form-label mb-0 ">Loại Thông Báo<span
                                                style="color: red">*</span>:</label>
                                    </div>
                                    <div class="col-xl-12 font-placeholder">
                                        <select class="js-example-basic-single select2 loai-thong-bao form-control "
                                            name="loai_thong_bao">
                                            @foreach($loaiThongBao as $ltb)
                                                <option value="{{$ltb->id}}">{{$ltb->ten}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xl-12 label-left">
                                        <label class="form-label mb-0 ">Người Theo Dõi:</label>
                                    </div>
                                    <div class="col-xl-12">
                                        <input type="text" class="form-control" value="" ::placeholder{ color: }>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xl-5 label-left">
                                        <label class="form-label">Ban Hành:</label>
                                    </div>
                                    <div class="col-xl-7 pe-0">
                                        <label class="custom-switch">
                                            <input type="checkbox" name="xuat_ban" value="1"
                                                class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description"></span>
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
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row align-items-center">
                                    <label class="col-sm-2 form-label">Tiêu đề <span style="color: red">*</span>:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tieu_de" value="{{old('tieu_de') ?? ''}}" required class="form-control" placeholder="Nhập tiêu đề...">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row ">
                                    <label class="col-sm-2 form-label">Nội dung <span style="color: red">*</span>:</label>
                                    <div class="col-sm-10">
                                        <textarea name="noi_dung" id="tiny"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="row">
                                    <label class="col-sm-2 form-label">Đính kèm: </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="upload" type="file" name="fileInput[]"
                                            multiple />
                                        <div class="files d-none">
                                            <ul></ul>
                                        </div>
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
                    </div>
                </div>
            </div>
        </form>
        <!-- END ROW -->
    </div>
@stop
