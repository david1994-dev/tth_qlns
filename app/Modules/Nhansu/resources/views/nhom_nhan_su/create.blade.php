@extends('adminlte.Layout.app')
@section('content')


    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tạo Nhóm Nhân Sự</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('nhansu.nhom-nhan-su.store') }}" method="post">
                        @csrf
                        <div class="">
                            <div class="form-group">
                                <label for="ma" class="form-label">Mã:</label>
                                <input type="text" name="ma" class="form-control" id="ma" placeholder="Nhập mã...">
                            </div>
                            <div class="form-group">
                                <label for="ten" class="form-label">Tên:</label>
                                <input type="text" name="ten" class="form-control" id="ten" placeholder="Nhập tên...">
                            </div>
                            <div class="form-group">
                                <label class=" form-label">Chọn Nhân Sự:</label>
                                <div class="option exit-option">
                                    <select class="form-control select2" name="user_ids[]" multiple>
                                        @foreach($nhanVien as $nv)
                                            <option value="{{$nv->user_id}}">{{$nv->ho_ten.' - '.$nv->phongBan->ten.' - '.$nv->chiNhanh->ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary ">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        {{--$(document).ready(function() {--}}
        {{--    $('.jsSelectNV').select2({--}}
        {{--        ajax: {--}}
        {{--            url: '{!! route('nhansu.nhan-vien.searchAjax') !!}',--}}
        {{--            dataType: 'json',--}}
        {{--            delay: 300,--}}
        {{--            data: function(params) {--}}
        {{--                return query = {--}}
        {{--                    search: params.term,--}}
        {{--                    page: params.page--}}
        {{--                }--}}
        {{--            },--}}
        {{--            processResults: function(data, params) {--}}
        {{--                params.page = params.page || 1;--}}

        {{--                return {--}}
        {{--                    results: data.items,--}}
        {{--                    pagination: {--}}
        {{--                        more: (params.page * 50) < data.count--}}
        {{--                    }--}}
        {{--                };--}}
        {{--            },--}}
        {{--            cache: true--}}
        {{--        },--}}
        {{--        placeholder: 'Nhập mã hoặc họ tên nhân viên...',--}}
        {{--        minimumInputLength: 1,--}}
        {{--    })--}}
        {{--});--}}
        $('.select2').select2()
    </script>

@stop
