@extends('adminlte.Layout.app')
@section('styles')
    <style>
        .roles .select2-container .select2-selection--multiple {
            min-height: 40px;
        }

        .option-roles .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #007bff;
        }

        .exit-option .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: red;
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
                <form>
                    <div class="row">
                        <div class="form-group col-6">
                            <div class="row align-items-center">
                                <label class="col-sm-2 form-label">Người nhận</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control w-50">
                                </div>
                            </div>
                        </div>
                        <div class="form-group select22 col-6">
                            <div class="row align-items-center">
                                <label class="col-sm-2 form-label">Loại thông báo</label>
                                <select class="select2 form-control col-sm-10" name="tinh_trang_hon_nhan"
                                    id="tinh_trang_hon_nhan">
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
                                <textarea rows="10" class="form-control" style="height: 245px;"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
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
