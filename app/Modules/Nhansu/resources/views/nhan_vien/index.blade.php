@extends('adminlte.Layout.app')
@section('content')
    <div class="box box-primary mt-3">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-6">
                    <form class="input-group mt-3 mb-3 " role="search" action="{{ route('nhansu.nhan-vien.index') }}">
                        <input type="text" class="form-control"
                            placeholder="Nhập mã ứng viên, email, số điện thoại, họ tên..." name="keyword"
                            aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $keyword ?? '' }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <a href="{{ route('nhansu.nhan-vien.index') }}" class="btn btn-primary mt-3 mb-3"><i
                            class="bi bi-arrow-clockwise"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10">
                    <p style="display: inline-block;"><b>{{ $count }}</b> Nhân Viên</p>
                </div>
                <div class="col-sm-2">
                    <a href="{{ route('nhansu.nhan-vien.create') }}">
                        <button class="btn btn-success  btn-sm mb-3">
                            <span class="text-light"> Thêm mới nhân viên <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                              </svg></span>
                        </button>
                    </a>
                </div>
            </div>

           <div class="row">
               <div class="col-sm-12 col-md-12">
                   <div class="dt-buttons btn-group flex-wrap">
                       @foreach($nhanVienByType as $type => $total)
                           <a href="{{route('nhansu.nhan-vien.index').'?type='.$type}}" class="btn btn-primary buttons-copy buttons-html5 child"
                              tabindex="0" aria-controls="example1" type="button"><span>{{\Illuminate\Support\Arr::get($loaiNhanVien, $type, '')}}({{$total}})</span>
                           </a>
                       @endforeach
                   </div>
               </div>
           </div>
        </div>
    </div>
    <div class="box-body card" style=" overflow-x: scroll; ">
        <table class="table table-striped">
            <thead>
                <tr class="table table-striped">
                    <th>STT</th>
                    <th>Mã Nhân Viên</th>
                    <th>Email</th>
                    <th>Họ Và Tên</th>
                    <th>Giới Tính</th>
                    <th>Ngày Sinh</th>
                    <th>Chi Nhánh</th>
                    <th>Ngày Tạo</th>
                    <th>QR</th>
                    <th>Loại Nhân Viên</th>
                    <th class="text-center">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($models as $model)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{$model->ma}}</td>
                            <td>{{$model->email}}</td>
                            <td>{{$model->ho_ten}}</td>
                            <td>
                                {{\Illuminate\Support\Arr::get(\App\Modules\Nhansu\src\Models\NhanVien::GIOI_TINH, $model->gioi_tinh, '')}}
                            </td>
                            <td>{{$model->ngay_sinh ? $model->ngay_sinh->format('d/m/Y') : ''}}</td>
                            <td>{{@$model->chiNhanh->ten}}</td>
                            <td>{{$model->created_at->format('d/m/Y')}}</td>
                            <td></td>
                            <td>{{$model->loaiNhanVien->ten}}</td>
                            <td class="text-center">
                                <a class="btn btn-danger btn-sm delete-button"
                                   data-delete-url="{{route('nhansu.nhan-vien.destroy', $model->id)}}">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a class="btn btn-primary btn-sm" target="_blank" href="{{route('nhansu.nhan-vien.edit', $model->id)}}">
                                        <i class="bi bi-pencil-square"></i>
                                </a>
                                <a target="_blank" href="{{route('nhansu.nhan-vien.show', $model->id)}}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-eye-fill"></i>
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
@stop
