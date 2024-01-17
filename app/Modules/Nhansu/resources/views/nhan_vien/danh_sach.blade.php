@extends('adminlte.Layout.app')
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <form action="">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input name="keyword" placeholder="Nhập mã chi nhánh, tên chi nhánh.." class="form-control"
                            value="{{ $keyword ?? '' }}" />
                    </div>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="" class="btn btn-danger">Reset</a>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-sm-6">
                <p style="display: inline-block;"><b></b> Nhân viên</p>
            </div>
        </div>
    </div>
    <div class="box-body card" style=" overflow-x: scroll; ">
        <table class="table table-striped">
            <thead>
                <tr class="table table-striped">
                    <th>STT</th>
                    <th>Mã Nhân Viên</th>
                    <th>Email</th>
                    <th>Họ Và Tên</th>
                    <th>Giới Tính</th>
                    <th>Ngày Sinh</th>
                    <th>Chi Nhánh</th>
                    <th>Ngày Tạo</th>
                    <th>QR</th>
                    <th class="text-center">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>1</td>
                        <td>003437</td>
                        <td>tranminhtien@gmail.com</td>
                        <td>Trần Hậu Minh Tiến</td>
                        <td>Nam</td>
                        <td>04/10/2001</td>
                        <td>TCT</td>
                        <td>17/01/2024</td>
                        <td></td>
                        <td class="text-center">
                            <a class="btn btn-danger btn-sm delete-button"
                                data-delete-url="">
                                Xóa <i class="bi bi-trash"></i>
                            </a>
                            <a class="btn btn-primary btn-sm" target="_blank"
                                href="">
                                Sửa <i class="bi bi-pencil-square"></i>
                            </a>
                            <a target="_blank" href="" class="btn btn-primary btn-sm">
                                  Chi tiết  <i class="bi bi-eye-fill"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>003438</td>
                        <td>giapbka@gmail.com</td>
                        <td>Hoàng Văn Giáp</td>
                        <td>Nam</td>
                        <td>02/01/1994</td>
                        <td>TCT</td>
                        <td>17/01/2024</td>
                        <td></td>
                        <td class="text-center">
                            <a class="btn btn-danger btn-sm delete-button"
                                data-delete-url="">
                                Xóa <i class="bi bi-trash"></i>
                            </a>
                            <a class="btn btn-primary btn-sm" target="_blank"
                                href="">
                                Sửa <i class="bi bi-pencil-square"></i>
                            </a>
                            <a target="_blank" href="" class="btn btn-primary btn-sm">
                                  Chi tiết  <i class="bi bi-eye-fill"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>003439</td>
                        <td>ngocnh@gmail.com</td>
                        <td>Nguyễn Hải Ngọc</td>
                        <td>Nam</td>
                        <td>01/01/1991</td>
                        <td>TCT</td>
                        <td>17/01/2024</td>
                        <td></td>
                        <td class="text-center">
                            <a class="btn btn-danger btn-sm delete-button"
                                data-delete-url="">
                                Xóa <i class="bi bi-trash"></i>
                            </a>
                            <a class="btn btn-primary btn-sm" target="_blank"
                                href="">
                                Sửa <i class="bi bi-pencil-square"></i>
                            </a>
                            <a target="_blank" href="" class="btn btn-primary btn-sm">
                                  Chi tiết  <i class="bi bi-eye-fill"></i>
                            </a>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
    {{-- <div class="box-footer">
        {!! \PaginationHelper::render(
            $paginate['order'],
            $paginate['direction'],
            $paginate['offset'],
            $paginate['limit'],
            $count,
            $paginate['baseUrl'],
            [],
        ) !!}
    </div> --}}
</div>
@stop
