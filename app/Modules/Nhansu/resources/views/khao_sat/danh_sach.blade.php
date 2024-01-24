@extends('adminlte.Layout.app')
@section('styles')
    <style>
        .parent {
            display: flex;
            flex-wrap: wrap;
        }

        .child {
            /* border: solid 1px; */
            /* border-radius: 7px; */
            /* padding: 5px; */
            flex: 1 0 15%;
            /* explanation below */
            margin-bottom: 5px;
            /* background-color: blue; */
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-6">
                    <form class="input-group mt-3 mb-3 " role="search" action="{{ route('nhansu.danhSachUngVien') }}">
                        <input type="text" class="form-control"
                            placeholder="Nhập mã ứng viên, email, số điện thoại, họ tên..." name="keyword"
                            aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $keyword ?? '' }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <a href="{{ route('nhansu.danhSachUngVien') }}" class="btn btn-primary mt-3 mb-3"><i
                            class="bi bi-arrow-clockwise"></i></a>
                </div>
            </div>




            {{-- <form action="{{ route('nhansu.danhSachUngVien') }}">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input name="keyword" placeholder="Nhập mã ứng viên, email, số điện thoại, họ tên..."
                                class="form-control" value="{{ $keyword ?? '' }}" />
                        </div>
                    </div>
                </div>
                <div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{ route('nhansu.danhSachUngVien') }}" class="btn btn-danger">Reset</a>
                    </div>
                </div>
            </form> --}}

            <div class="col-sm-12 col-md-12">
                <div class="dt-buttons btn-group flex-wrap"> <button class="btn btn-primary buttons-copy buttons-html5 child"
                        tabindex="0" aria-controls="example1" type="button"><span>Danh sách nhân viên(60)</span></button> <button
                        class="btn btn-primary buttons-csv buttons-html5 child" tabindex="0" aria-controls="example1"
                        type="button"><span>Danh sách nhân viên(60)</span></button> <button
                        class="btn btn-primary buttons-excel buttons-html5 child" tabindex="0" aria-controls="example1"
                        type="button"><span>Danh sách nhân viên(60)</span></button> <button
                        class="btn btn-primary buttons-pdf buttons-html5 child" tabindex="0" aria-controls="example1"
                        type="button"><span>Danh sách nhân viên(60)</span></button>
                         <button class="btn btn-primary buttons-print child"
                        tabindex="0" aria-controls="example1" type="button"><span>Danh sách nhân viên(60)</span></button>
                        <button class="btn btn-primary buttons-print child"
                        tabindex="0" aria-controls="example1" type="button"><span>Danh sách nhân viên(60)</span></button>
                        <button class="btn btn-primary buttons-print child"
                        tabindex="0" aria-controls="example1" type="button"><span>Danh sách nhân viên(60)</span></button>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-11">
                </div>
                <div class="col-1">
                    <p style="display: inline-block; margin-bottom: 2px"><b>{{ $count }}</b> Ứng Viên</p>
                </div>
            </div> --}}

        </div>
        <div class="box-body" style=" overflow-x: scroll; ">
            <table class="table table-striped">
                <thead>
                    <tr class="table table-striped">
                        <th>Mã Ứng Viên</th>
                        <th>Họ Tên</th>
                        <th>Ngày sinh</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Loại Ứng Viên</th>
                        <th>Vị Trí Ứng Tuyển</th>
                        <th>Trường Đào Tạo</th>
                        <th>Ngày Lập Phiếu</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($models as $model)
                        @php
                            $chiTiet = $model->chi_tiet ?? [];
                        @endphp
                        <tr>
                            <td>{{ $model->mauv }}</td>
                            <td>{{ $model->ho_ten }}</td>
                            <td>{{ $model->ngay_sinh->format('d/m/Y') }}</td>
                            <td>{{ $model->dien_thoai }}</td>
                            <td>{{ $model->email }}</td>
                            <td>{{ \Illuminate\Support\Arr::get(\App\Modules\Nhansu\src\Models\UngVien::LOAI_UNG_VIEN_TEXT, $model->loai_ung_vien, '') }}
                            </td>
                            <td>
                                {{ $model->vi_tri_ung_tuyen }}
                            </td>
                            <td>
                                {{ \Illuminate\Support\Arr::get($chiTiet, 'truong_dao_tao', '') }}
                            </td>
                            <td>
                                {{ $model->created_at->format('d/m/Y') }}
                            </td>
                            <td class="text-center">
                                <div class="row">
                                    <a target="_blank" href="{{ route('nhansu.chiTietUngVien', $model->id) }}"
                                        class="col-4">
                                        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                            title="Chi tiết">
                                            <i class="bi bi-eye-fill"></i>
                                        </button>
                                    </a>
                                    <a data-delete-url="{{ route('nhansu.ung-vien.destroy', $model->id) }}" class="col-4">
                                        <button class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                            title="Xóa">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </a>
                                    <a href="" class="col-4">
                                        <button class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                            title="Chuyển thành nhân viên">
                                            <i class="bi bi-arrow-repeat"></i>
                                        </button>
                                    </a>
                                </div>
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
    </div>
@stop
