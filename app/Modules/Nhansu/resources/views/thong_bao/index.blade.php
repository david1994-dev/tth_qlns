@extends('adminlte.Layout.app')
@section('content')
    <div class="side-app main-container">

        <!-- PAGE HEADER -->
        <div class="page-header d-lg-flex d-block">
            <div class="page-leftheader">
                <div class="page-title">THÔNG BÁO NỘI BỘ</div>
            </div>
            <div class="page-rightheader ms-md-auto">
                <div class=" btn-list">
                    <button class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                        data-bs-original-title="E-mail"> <i class="feather feather-mail"></i> </button>
                    <button class="btn btn-light" data-bs-placement="top" data-bs-toggle="tooltip" title=""
                        data-bs-original-title="Contact"> <i class="feather feather-phone-call"></i> </button>
                    <button class="btn btn-primary" data-bs-placement="top" data-bs-toggle="tooltip" title=""
                        data-bs-original-title="Info"> <i class="feather feather-info"></i> </button>
                </div>
            </div>
        </div>
        <!-- END PAGE HEADER -->

        <!-- ROW -->
        <div class="row">
            <div class="col-md-12 col-lg-4 col-xl-3">
                <div class="card">
                    <div class="list-group list-group-transparent mb-0 mail-inbox pb-3">
                        <div class="m-4 text-center">
                            <a href="{{route('nhansu.thong-bao.create')}}"
                               class="btn btn-primary btn-lg btn-block">Tạo thông báo</a>
                        </div>
                        @foreach($loaiThongBao as $ltb)
                            <a href="{{route('nhansu.thong-bao.index').'?category='.$ltb->id}}" class="list-group-item d-flex align-items-center ">
                                <span class="icons"><i class="{{$ltb->icon}}"></i></span>{{$ltb->ten}}<span
                                    class="ms-auto badge badge-success">{{\Illuminate\Support\Arr::get($thongBaoUnreadByType, $ltb->id, 0)}}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body p-6">
                        <div class="inbox-body">
                            <div class="mail-option">
                                <form style="border: 2px solid;border-radius: 10px;border-color: #e9ebfa;">
                                    <div class="form-row"
                                        style="padding-top: 18px; padding-left: 70px;">
                                        <div class="form-group col-md-2 mb-0">
                                            <div class="form-group">
                                                <div class="col-xl-12 placeholder2">
                                                    <select class="js-example-basic-single form-control select2 " name="">
                                                        <option>Bình thường</option>
                                                        <option>Khẩn</option>
                                                        <option>Mật</option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group">
                                                <input type="text" class="form-control" id="country"
                                                    placeholder="Loại thông báo">
                                            </div> --}}
                                        </div>
                                        <div class="form-group col-md-2 mb-0">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="region"
                                                    placeholder="Tiêu đề">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 mb-0">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <span class="feather feather-clock">Từ ngày</span>
                                                    </div>
                                                </div>
                                                <input class="form-control" id="datepicker-date" type="date"
                                                    placeholder="Date Range" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 mb-0">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <span class="feather feather-clock">Tới ngày</span>
                                                    </div>
                                                </div>
                                                <input class="form-control" id="datepicker-date" type="date"
                                                    placeholder="Date Range" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2 mb-0">
                                            <div>
                                                <a type="submit" class="btn btn-primary">Tìm kiếm</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-inbox table-hover text-nowrap mb-0">
                                    <tbody>
                                        @foreach ($models as $model)
                                            <tr class="@if (!$model->isRead) unread @endif jsViewDetail"
                                                data-url="{{ route('nhansu.thong-bao.show', $model->id) }}">
                                                <td class="inbox-small-cells"><i class="fa fa-bookmark text-danger"></i>
                                                </td>
                                                <td class="view-message">Thông báo: </td>
                                                <td class="view-message dont-show font-weight-semibold"
                                                    style="font-size: 13px">
                                                    {{ $model->sendFrom }}
                                                </td>
                                                <td class="view-message" style="max-width: 500px ; overflow:hidden">
                                                    {{ $model->tieu_de }}</td>
                                                <td class="view-message text-end " style="font-size: 12px">
                                                    {{ $model->created_at->format('d-m-Y h:i:s') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
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
        </div>
        <!-- END ROW -->

    </div>
@stop
@section('scripts')
    <script>
        $('.jsViewDetail').on('click', function() {
            window.location = $(this).data('url');
        })
    </script>
@stop
