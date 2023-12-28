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
    <div class="container-fluid">
        <div class="box box-primary">
            <div class="box-header with-border">
                <form action="{{ route('nhansu.danhSachUngVien') }}">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input name="keyword" placeholder="Nhập mã ứng viên, email, số điện thoại, họ tên..." class="form-control" value="{{ $keyword ?? '' }}"/>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Search</button>
                            <a href="{{ route('nhansu.danhSachUngVien') }}" class="btn btn-danger">Reset</a>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-sm-6">
                        <p style="display: inline-block;"><b>{{$count}}</b> Ứng Viên</p>
                    </div>
                </div>
            </div>
            <div class="box-body" style=" overflow-x: scroll; ">
                <table class="table table-bordered">
                    <thead>
                    <tr class="table table-striped">
                        <th>Mã Ứng Viên</th>
                        <th>Họ Tên</th>
                        <th>Ngày sinh</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Loại Ứng Viên</th>
                        <th class="text-center">Chi tiết</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($models as $model)
                        <tr>
                            <td>{{$model->mauv}}</td>
                            <td>{{$model->ho_ten}}</td>
                            <td>{{$model->ngay_sinh->format('d/m/Y')}}</td>
                            <td>{{$model->dien_thoai}}</td>
                            <td>{{$model->email}}</td>
                            <td>{{\Illuminate\Support\Arr::get(\App\Modules\Nhansu\src\Models\UngVien::LOAI_UNG_VIEN_TEXT, $model->loai_ung_vien, '')}} </td>
                            <td class="text-center">
                                <a target="_blank" href="{{route('nhansu.chiTietUngVien', $model->id)}}">
                                    <button class="btn btn-primary">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                {!! \PaginationHelper::render($paginate['order'], $paginate['direction'], $paginate['offset'], $paginate['limit'], $count, $paginate['baseUrl'], []) !!}
            </div>
        </div>
    </div>
@stop
