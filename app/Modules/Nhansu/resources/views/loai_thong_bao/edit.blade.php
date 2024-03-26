@extends('adminlte.Layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Chỉnh Sửa Loại Thông Báo
                    </h3>
                </div>

                <form action="{{route('nhansu.loai-thong-bao.update', $model->id)}}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label>Tên</label>
                            <input value="{{$model->ten}}" type="text" name="ten" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Icon</label>
                            <input value="{{$model->icon}}" type="text" name="icon" class="form-control" required>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
        </div>
    </div>
@stop
