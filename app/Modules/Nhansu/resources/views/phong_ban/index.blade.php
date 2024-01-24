@extends('adminlte.Layout.app')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-6">
                    <form class="input-group mt-3 mb-3 " role="search" action="{{ route('nhansu.khoa-phong-ban.index') }}">
                        <input type="text" class="form-control"
                            placeholder="Nhập mã phòng ban, tên phòng ban..." name="keyword"
                            aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $keyword ?? '' }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <a href="{{ route('nhansu.khoa-phong-ban.index') }}" class="btn btn-primary mt-3 mb-3"><i
                            class="bi bi-arrow-clockwise"></i></a>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-10">
                    <p style="display: inline-block;"><b>{{ $count }}</b> Phòng Ban</p>
                </div>
                <div class="col-sm-2">
                    <a href="{{ route('nhansu.khoa-phong-ban.create') }}">
                        <button class="btn btn-success  btn-sm mb-3">
                            <span class="fa-solid fa-person-circle-plus text-light h5 my-auto me-1"></span>
                            <span class="text-light"> Thêm mới phòng ban <i class="bi bi-plus-circle"></i></span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="box-body card" style=" overflow-x: scroll; ">
            <table class="table table-bordered">
                <thead>
                    <tr class="table table-striped">
                        <th>Mã Phòng Ban</th>
                        <th>Tên Phòng Ban</th>
                        <th>Chi Nhánh</th>
                        <th>Định Biên</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models as $model)
                        <tr>
                            <td>{{ $model->ma }}</td>
                            <td>{{ $model->ten }}</td>
                            <td>{{ $model->chiNhanh->ten }}</td>
                            <td>{{ $model->dinh_bien }}</td>
                            <td class="text-center">
                                <a class="btn btn-danger btn-sm delete-button"
                                    data-delete-url="{{ route('nhansu.khoa-phong-ban.destroy', $model->id) }}">
                                    Xóa <i class="bi bi-trash"></i>
                                </a>
                                <a class="btn btn-primary btn-sm" target="_blank"
                                    href="{{ route('nhansu.khoa-phong-ban.edit', $model->id) }}">
                                    Sửa <i class="bi bi-pencil-square"></i>
                                </a>
                                <a class="btn btn-info btn-sm" target="_blank"
                                    href="{{ route('nhansu.khoaphongban.sodotochuc', $model->id) }}" title="Sơ đổ tổ chức">
                                    Sơ đồ <i class="bi bi-signpost-2"></i>
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
    </div>
@stop
