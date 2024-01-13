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
                    <th>Mã Chi Nhánh</th>
                    <th>Tên Chi Nhánh</th>
                    <th>Slug</th>
                    <th>Ngày Tạo</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($models as $model)
                    <tr>
                        <td>{{$model->ma}}</td>
                        <td>{{$model->ten}}</td>
                        <td>{{$model->slug}}</td>
                        <td>{{$model->dien_thoai}}</td>
                        <td>{{$model->email}}</td>
                        <td>{{\Illuminate\Support\Arr::get(\App\Modules\Nhansu\src\Models\UngVien::LOAI_UNG_VIEN_TEXT, $model->loai_ung_vien, '')}} </td>
                        <td>
                            {{$model->vi_tri_ung_tuyen}}
                        </td>
                        <td>
                            {{\Illuminate\Support\Arr::get($chiTiet, 'truong_dao_tao', '')}}
                        </td>
                        <td>
                            {{$model->created_at->format('d/m/Y')}}
                        </td>
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
@stop
