@extends('adminlte.Layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Chỉnh Sửa Phòng Ban
                    </h3>
                </div>

                <form action="{{route('nhansu.khoa-phong-ban.update', $model->id)}}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Thuộc chi nhánh</label>
                            <select name="chi_nhanh_id" id="" class="form-control">
                                @foreach ($list_chinhanh as $key_chinhanh => $item_chinhanh)
                                    <option @if($model->chi_nhanh_id == $key_chinhanh) selected @endif value="{{ $key_chinhanh }}">{{ $item_chinhanh }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mã</label>
                            <input value="{{$model->ma}}" type="text" name="ma" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tên khoa phòng</label>
                            <input value="{{$model->ten}}" type="text" name="ten" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Định biên</label>
                            <input value="{{$model->dinh_bien}}" type="text" name="dinh_bien" class="form-control">
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
