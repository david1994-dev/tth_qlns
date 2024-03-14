@extends('adminlte.Layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Chỉnh Sửa Chi Nhánh
                    </h3>
                </div>

                <form action="{{route('nhansu.chi-nhanh.update', $model->id)}}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã</label>
                            <input type="text" name="ma" value="{{$model->ma}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
                            <input type="text" value="{{$model->ten}}" name="ten" class="form-control" required>
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
