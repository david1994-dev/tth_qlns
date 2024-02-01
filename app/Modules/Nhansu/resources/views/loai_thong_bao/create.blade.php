@extends('adminlte.Layout.app')

@section('breadcrumb')
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Tạo Loại Thông Báo
                    </h3>
                </div>

                <form action="{{ route('nhansu.loai-thong-bao.store') }}" method="post">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" name="ten" class="form-control" required>
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
