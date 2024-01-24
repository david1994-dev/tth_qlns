@extends('adminlte.Layout.app')
@section('content')
    <div class="box box-primary mt-3">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-6">
                    <form class="input-group mt-3 mb-3 " role="search" action="">
                        <input type="text" class="form-control"
                            placeholder="Nhập mã ứng viên, email, số điện thoại, họ tên..." name="keyword"
                            aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $keyword ?? '' }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <a href="" class="btn btn-primary mt-3 mb-3"><i
                            class="bi bi-arrow-clockwise"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p style="display: inline-block;"><b>{{$count}}</b> Nhân viên</p>
                </div>
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
                    <th>Loại Nhân Viên</th>
                    <th class="text-center">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($models as $model)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{$model->ma}}</td>
                            <td>{{$model->email}}</td>
                            <td>{{$model->ho_ten}}</td>
                            <td>
                                {{\Illuminate\Support\Arr::get(\App\Modules\Nhansu\src\Models\NhanVien::GIOI_TINH, $model->gioi_tinh, '')}}
                            </td>
                            <td>{{$model->ngay_sinh ? $model->ngay_sinh->format('d/m/Y') : ''}}</td>
                            <td>{{@$model->chiNhanh->ten}}</td>
                            <td>{{$model->created_at->format('d/m/Y')}}</td>
                            <td></td>
                            <td>{{\Illuminate\Support\Arr::get(\App\Modules\Nhansu\src\Models\NhanVien::LOAI_NHAN_VIEN, $model->loai_nhan_vien, '')}}</td>
                            <td class="text-center">
                                <a class="btn btn-danger btn-sm delete-button"
                                   data-delete-url="{{route('nhansu.nhan-vien.destroy', $model->id)}}">
                                    Xóa <i class="bi bi-trash"></i>
                                </a>
                                <a target="_blank" href="{{route('nhansu.nhan-vien.edit', $model->id)}}" class="btn btn-primary btn-sm">
                                    Chi tiết  <i class="bi bi-eye-fill"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
    <div class="box-footer">
        {!! \PaginationHelper::render(
            $paginate['order'],
            $paginate['direction'],
            $paginate['offset'],
            $paginate['limit'],
            $count,
            $paginate['baseUrl'],
            [],
        ) !!}
    </div>
@stop
