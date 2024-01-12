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
                <form action="{{ route('sucoykhoa.danhSachSuCo') }}">
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
                            <a href="{{ route('sucoykhoa.danhSachSuCo') }}" class="btn btn-danger">Reset</a>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-sm-6">
                        <p style="display: inline-block;"><b>{{$count}}</b> Báo Cáo</p>
                    </div>
                </div>
            </div>
            <div class="box-body" style=" overflow-x: scroll; ">
                <table class="table table-bordered">
                    <thead>
                    <tr class="table table-striped">
                        <th>Mã </th>
                        <th>Nhóm Sự Cố</th>
                        <th>Trạng thái/Người Báo/Thời Gian Báo Cáo</th>
                        <th>Điểm Báo Cáo</th>
                        <th>Đánh Giá của BCV</th>
                        <th>Trạng thái sự cố</th>
                        <th>Thao Tác</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($models as $model)
                        @php
                            $chiTiet = $model->chi_tiet ?? [];
                        @endphp
                        <tr>
                            <td>{{$model->ma}}</td>
                            <td>
                                {{$model->mo_ta}} <br>
                                <span style="color: blue">{{$model->khoa_phong_su_co}}</span>
                            </td>
                            <td>{{$model->ho_ten_nguoi_bao_cao}}</td>
                            <td></td>
                            <td></td>
                            <td>
                               
                            </td>
                            <td>
                               
                            </td>
                            <td class="text-center">
                            
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
