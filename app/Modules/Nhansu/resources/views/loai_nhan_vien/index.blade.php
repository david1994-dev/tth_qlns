@extends('adminlte.Layout.app')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <form class="input-group mt-3 mb-3 " role="search" action="{{ route('nhansu.danhSachUngVien') }}">
                <input type="text" class="form-control"
                       placeholder="Nhập loại nhân viên..." name="keyword"
                       aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $keyword ?? '' }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
        <div class="box-body card" style=" overflow-x: scroll; ">
            <table class="table table-striped">
                <thead>
                <tr class="table table-striped">
                    <th>Tên</th>

                    <th>Ngày Tạo</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($models as $model)
                    <tr>
                        <td>{{$model->ten}}</td>

                        <td>{{$model->created_at->format('d/m/Y h:i:s')}}</td>
                        <td class="text-center">
                            <a class="delete-button" data-delete-url="{{route('nhansu.loai-nhan-vien.destroy', $model->id)}}">
                                <button class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </a>
                            <a target="_blank" href="{{route('nhansu.loai-nhan-vien.edit', $model->id)}}">
                                <button class="btn btn-primary">
                                    <i class="bi bi-pencil-square"></i>
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
@stop
