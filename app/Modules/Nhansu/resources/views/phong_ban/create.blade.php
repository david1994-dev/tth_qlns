@extends('adminlte.Layout.app')

@section('breadcrumb')
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Tạo Khoa Phòng Ban
                    </h3>
                </div>

                <form action="{{ route('nhansu.khoa-phong-ban.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Thuộc chi nhánh</label>
                            <select name="chi_nhanh_id" id="" class="form-control">
                                @foreach ($list_chinhanh as $key_chinhanh => $item_chinhanh)
                                    <option value="{{ $key_chinhanh }}">{{ $item_chinhanh }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mã</label>
                            <input type="text" name="ma" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tên khoa phòng</label>
                            <input type="text" name="ten" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Định biên</label>
                            <input type="text" name="dinh_bien" class="form-control">
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
