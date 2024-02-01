@extends('adminlte.Layout.app')
@section('styles')
    <style>
        .select22 .select2-container .select2-selection--single {
            height: calc(2.25rem + 1px) !important;
        }
    </style>
@stop
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2()

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
    <div class=" col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header border-bottom-0">
                <h3 class="card-title">ĐĂNG THÔNG BÁO</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-8">
                        <form>
                            <div class="row">
                                <div class="form-group select22 col-5">
                                    <div class="row align-items-center">
                                        <label class="col-sm-5 form-label">Loại thông báo </label>
                                        <select class="select2 form-control col-sm-7"
                                            name="loai_thong_bao" id="loai_thong_bao">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2"></div>
                                <div class="form-group select22 col-5">
                                    <div class="row align-items-center">
                                        <label class="col-sm-3 form-label">Người nhận</label>
                                        <select class="select2 form-control col-sm-9  " name="nguoi_nhan"
                                            id="nguoi_nhan">
                                            <option value="Nhân viên khoa phòng">Nhân viên khoa phòng</option>
                                            <option value="Chuyên viên trưởng">Chuyên viên trưởng</option>
                                            <option value="Trưởng phòng">Trưởng phòng</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row align-items-center">
                                    <label class="col-sm-2 form-label">Tiêu đề</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row ">
                                    <label class="col-sm-2 form-label">Nội dung</label>
                                    <div class="col-sm-10">
                                        <textarea id="tiny"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-2"></div>
                </div>

            </div>
            <div class="card-footer d-sm-flex">
                <div class="mt-2 mb-2">
                    <a href="javascript:void(0)" class="btn btn-icon btn-white btn-svg" data-bs-toggle="tooltip"
                        title="" data-original-title="Attach" data-bs-original-title=""><span
                            class="ri-attachment-2"></span></a>
                    <a href="javascript:void(0)" class="btn btn-icon btn-white btn-svg" data-bs-toggle="tooltip"
                        title="" data-original-title="Link" data-bs-original-title=""><span
                            class="ri-link"></span></a>
                    <a href="javascript:void(0)" class="btn btn-icon btn-white btn-svg" data-bs-toggle="tooltip"
                        title="" data-original-title="Photos" data-bs-original-title=""><span
                            class="ri-image-line"></span></a>
                    <a href="javascript:void(0)" class="btn btn-icon btn-white btn-svg" data-bs-toggle="tooltip"
                        title="" data-original-title="Delete" data-bs-original-title=""><span
                            class="ri-delete-bin-line"></span></a>
                </div>
                <div class="btn-list ms-auto">
                    <button class="btn btn-danger btn-space">Hủy bỏ</button>
                    <button class="btn btn-primary btn-space">Đăng thông báo</button>
                </div>
            </div>
        </div>
    </div>
@stop
