@extends('adminlte.Layout.app')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <form action="{{ route('nhansu.chi-nhanh.index') }}">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input name="keyword" placeholder="Nhập mã chi nhánh, tên chi nhánh.." class="form-control" value="{{ $keyword ?? '' }}"/>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{ route('nhansu.chi-nhanh.index') }}" class="btn btn-danger">Reset</a>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-sm-6">
                    <p style="display: inline-block;"><b>{{$count}}</b> Chi Nhánh</p>
                </div>
            </div>
        </div>
        <div class="box-body" style=" overflow-x: scroll; ">
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
                @foreach($models as $model)
                    <tr>
                        <td>{{$model->ma}}</td>
                        <td>{{$model->ten}}</td>
                        <td>{{$model->chiNhanh->ten}}</td>
                        <td>{{$model->dinh_bien}}</td>
                        <td class="text-center">
                            <a class="delete-button" data-delete-url="{{route('nhansu.khoa-phong-ban.destroy', $model->id)}}">
                                <button class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </a>
                            <a target="_blank" href="{{route('nhansu.khoa-phong-ban.edit', $model->id)}}">
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
