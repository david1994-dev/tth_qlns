@extends('adminlte.Layout.app')

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
    <h2 class="text-center fw-bold">DANH SÁCH NHÂN VIÊN</h2>

    <table id="customerTable" class="table table-light table-striped table-bordered">
        <thead>
            <tr class="table table-striped">
                <th>Mã NV</th>
                <th>Họ Tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Số điện thoại</th>
                <th>Ảnh</th>
                <th class="text-center">Chỉnh sửa</th>
                <th class="text-center">Xóa</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>NV001</td>
                <td>Trần Hậu Minh Tiến</td>
                <td>04/10/2001</td>
                <td>Nam</td>
                <td>0837790795 </td>
                <td><img src="" alt=""></td>
                <td class="text-center">
                    <a>
                        <button class="btn btn-primary">
                            <i class="bi bi-pen-fill"></i>
                        </button>
                    </a>
                </td>
                <td class="text-center">
                    <a data-bs-toggle="modal">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                            <i class="bi bi-trash"></i>
                        </button>
                        {{-- <button class="btn btn-danger btn-outline-secondary btn-sm" >
                            <span class="fa-solid fa-person-circle-minus text-light h6 m-auto px-2" ><i class="bi bi-trash"></i></span>
                        </button> --}}
                    </a>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa nhân viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa nhân viên này ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-danger">Xóa</button>
                </div>
            </div>
        </div>
    </div>


@stop
