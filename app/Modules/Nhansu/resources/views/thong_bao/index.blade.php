@extends('adminlte.Layout.app')
@section('content')
    <div class="side-app main-container">

        <!-- PAGE HEADER -->
        <div class="page-header d-lg-flex d-block">
            <div class="page-leftheader">
                <div class="page-title">THÔNG BÁO NỘI BỘ</div>
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
            <div class="col-md-12 col-lg-4 col-xl-3">
                <div class="card">
                    <div class="list-group list-group-transparent mb-0 mail-inbox pb-3">
                        <div class="m-4 text-center">
                            <a href="https://laravelui.spruko.com/dayone/email-compose"
                               class="btn btn-primary btn-lg btn-block">Compose</a>
                        </div>
                        @foreach($thongBaoByType as $thongBaoGroup)
                            <a href="javascript:void(0);" class="list-group-item d-flex align-items-center active">
                                <span class="icons"><i class="{{$thongBaoGroup->icon}}"></i></span>{{$thongBaoGroup->ten}}<span
                                    class="ms-auto badge badge-success">0</span>
                            </a>
                        @endforeach
                    </div>
                    <div class="card-body border-top">
                        <div class="list-group list-group-transparent mb-0 mail-inbox">
                            <a href="javascript:void(0);"
                               class="list-group-item list-group-item-action d-flex align-items-center px-0 py-2">
                                <span class="w-3 h-3 brround bg-primary me-2"></span> Mới
                            </a>
                            <a href="javascript:void(0);"
                               class="list-group-item list-group-item-action d-flex align-items-center px-0 py-2">
                                <span class="w-3 h-3 brround bg-success me-2"></span> Chưa xem
                            </a>
                            <a href="javascript:void(0);"
                               class="list-group-item list-group-item-action d-flex align-items-center px-0 py-2">
                                <span class="w-3 h-3 brround bg-danger me-2"></span> Khẩn
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body p-6">
                        <div class="inbox-body">
                            <div class="mail-option">
                                <div class="mt-0">
                                    <form class="form-inline">
                                        <div class="search-element ">
                                            <input type="search" class="form-control header-search"
                                                   placeholder="Search…" aria-label="Search" tabindex="1">
                                            <button class="btn btn-primary-color">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div >
                                    <ul class="unstyled inbox-pagination ">
                                        <li><span>1-50 of 234</span></li>

                                        <li>
                                            <a class="np-btn" href="javascript:void(0);"><i
                                                    class="fa fa-angle-right pagination-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-inbox table-hover text-nowrap mb-0">
                                    <tbody>
                                    <tr class="" >
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Phòng hành chính quản
                                            trị</td>
                                        <td class="view-message" href ="facebook.com">Kế hoạch phân công khu vực vệ sinh khối văn phòng Tổng
                                            Công Ty tháng 01 năm 2024</td>
                                        <td class="view-message text-end font-weight-semibold">29-01-2024</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Văn thư tổng công ty
                                        </td>
                                        <td class="view-message">Số 32/QĐ-TTH Về việc Ban hành Quy trình thanh toán
                                        </td>
                                        <td class="view-message text-end font-weight-semibold">27-01-2024</td>
                                    </tr>
                                    <tr class="unread">
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark text-danger"></i></td>
                                        <td class="view-message  dont-show">Phòng tuyển dụng</td>
                                        <td class="view-message">Thư chào nhân viên mới</td>
                                        <td class="view-message  text-end">26-01-2024</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Phòng hành chính quản
                                            trị</td>
                                        <td class="view-message">Kế hoạch phân công khu vực vệ sinh khối văn phòng Tổng
                                            Công Ty tháng 01 năm 2024</td>
                                        <td class="view-message text-end font-weight-semibold">29-01-2024</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Văn thư tổng công ty
                                        </td>
                                        <td class="view-message">Số 32/QĐ-TTH Về việc Ban hành Quy trình thanh toán
                                        </td>
                                        <td class="view-message text-end font-weight-semibold">27-01-2024</td>
                                    </tr>
                                    <tr class="unread">
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark text-danger"></i></td>
                                        <td class="view-message  dont-show">Phòng tuyển dụng</td>
                                        <td class="view-message">Thư chào nhân viên mới</td>
                                        <td class="view-message  text-end">26-01-2024</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Phòng hành chính quản
                                            trị</td>
                                        <td class="view-message">Kế hoạch phân công khu vực vệ sinh khối văn phòng Tổng
                                            Công Ty tháng 01 năm 2024</td>
                                        <td class="view-message text-end font-weight-semibold">29-01-2024</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Văn thư tổng công ty
                                        </td>
                                        <td class="view-message">Số 32/QĐ-TTH Về việc Ban hành Quy trình thanh toán
                                        </td>
                                        <td class="view-message text-end font-weight-semibold">27-01-2024</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark text-danger"></i></td>
                                        <td class="view-message  dont-show">Phòng tuyển dụng</td>
                                        <td class="view-message">Thư chào nhân viên mới</td>
                                        <td class="view-message  text-end">26-01-2024</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Phòng hành chính quản
                                            trị</td>
                                        <td class="view-message">Kế hoạch phân công khu vực vệ sinh khối văn phòng Tổng
                                            Công Ty tháng 01 năm 2024</td>
                                        <td class="view-message text-end font-weight-semibold">29-01-2024</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Văn thư tổng công ty
                                        </td>
                                        <td class="view-message">Số 32/QĐ-TTH Về việc Ban hành Quy trình thanh toán
                                        </td>
                                        <td class="view-message text-end font-weight-semibold">27-01-2024</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark text-danger"></i></td>
                                        <td class="view-message  dont-show">Phòng tuyển dụng</td>
                                        <td class="view-message">Thư chào nhân viên mới</td>
                                        <td class="view-message  text-end">26-01-2024</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Phòng hành chính quản
                                            trị</td>
                                        <td class="view-message">Kế hoạch phân công khu vực vệ sinh khối văn phòng Tổng
                                            Công Ty tháng 01 năm 2024</td>
                                        <td class="view-message text-end font-weight-semibold">29-01-2024</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Văn thư tổng công ty
                                        </td>
                                        <td class="view-message">Số 32/QĐ-TTH Về việc Ban hành Quy trình thanh toán
                                        </td>
                                        <td class="view-message text-end font-weight-semibold">27-01-2024</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark text-danger"></i></td>
                                        <td class="view-message  dont-show">Phòng tuyển dụng</td>
                                        <td class="view-message">Thư chào nhân viên mới</td>
                                        <td class="view-message  text-end">26-01-2024</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Phòng hành chính quản
                                            trị</td>
                                        <td class="view-message">Kế hoạch phân công khu vực vệ sinh khối văn phòng Tổng
                                            Công Ty tháng 01 năm 2024</td>
                                        <td class="view-message text-end font-weight-semibold">29-01-2024</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark"></i></td>
                                        <td class="view-message dont-show font-weight-semibold">Văn thư tổng công ty
                                        </td>
                                        <td class="view-message">Số 32/QĐ-TTH Về việc Ban hành Quy trình thanh toán
                                        </td>
                                        <td class="view-message text-end font-weight-semibold">27-01-2024</td>
                                    </tr>
                                    <tr class="">
                                        <td class="inbox-small-cells"><i class="fa fa-bookmark text-danger"></i></td>
                                        <td class="view-message  dont-show">Phòng tuyển dụng</td>
                                        <td class="view-message">Thư chào nhân viên mới</td>
                                        <td class="view-message  text-end">26-01-2024</td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <ul class="pagination ">
                    <li class="page-item page-prev disabled">
                        <a class="page-link" href="javascript:void(0);" tabindex="-1">Prev</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                    <li class="page-item page-next">
                        <a class="page-link" href="javascript:void(0);">Next</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END ROW -->

    </div>
@stop
