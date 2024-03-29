@extends('adminlte.Layout.app')
@section('styles')
    <style>
        .tox-tinymce-aux {
            position: relative;
            z-index: 10000 !important;
        }

        .main-footer {
            margin: 0px !important;
        }

        .select22 .select2-container .select2-selection--single {
            height: calc(2.25rem + 1px) !important;
        }

        .option .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #007bff !important;
            font-size: 12px;
        }

        .exit-option .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: red !important;
        }

        .select22 .select2-container .select2-selection--single {
            height: calc(2.25rem + 1px) !important;
        }

        .req_place::-webkit-select-placeholder {
            color: #c40303 !important;
        }
    </style>
@stop
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2()

            tinymce.init({
                selector: 'textarea#tiny2', // change this value according to your HTML
                plugins: [
                    'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
                    'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace',
                    'visualblocks',
                    'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table',
                    'help',
                    'wordcount'
                ],
                images_upload_url: '{!! route('nhansu.thong-bao.uploadImage') !!}',
                file_picker_types: 'image',
                relative_urls: false,
                remove_script_host: false
            });
        });
    </script>

    <script src="https://cdn.tiny.cloud/1/s5czkzl43fj1mskq5fews6aaqgi3szoefx33i9biqutkvdxn/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea#tiny', // change this value according to your HTML
            plugins: [
                'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
                'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
                'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help',
                'wordcount'
            ],
            images_upload_url: 'postAcceptor.php'
        });
    </script>

    <script>
        // function show1() {
        //     document.getElementById('div1').style.display = 'none';
        // }

        // function show2() {
        //     document.getElementById('div1').style.display = 'block';
        // }

        let radioButton = $('input[name="nguoi_nhan"]');
        radioButton.on('click', function() {
            let value = $('input[name="nguoi_nhan"]:checked').val();
            if (value === 'gui_ca_nhan') {
                $('#div1').removeClass('d-none')
            } else {
                $('#div1').addClass('d-none')
            }
        })
    </script>
@stop
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
                            <a href="https://laravelui.spruko.com/dayone/email-compose"
                                class="btn btn-primary btn-lg btn-block">Compose</a>
                        </div>
                        @foreach ($loaiThongBao as $ltb)
                            <a href="{{ route('nhansu.thong-bao.index') . '?category=' . $ltb->id }}"
                                class="list-group-item d-flex align-items-center ">
                                <span class="icons"><i class="{{ $ltb->icon }}"></i></span>{{ $ltb->ten }}<span
                                    class="ms-auto badge badge-success">{{ \Illuminate\Support\Arr::get($thongBaoUnreadByType, $ltb->id, 0) }}</span>
                            </a>
                        @endforeach
                    </div>
                    <div class="card-body border-top">
                        <div class="list-group list-group-transparent mb-0 mail-inbox">
                            <a href="javascript:void(0);"
                                class="list-group-item list-group-item-action d-flex align-items-center px-0 py-2">
                                <span class="w-3 h-3 brround bg-primary me-2"></span> Mới
                            </a>
                            <a href="javascript:void(0);"
                                class="list-group-item list-group-item-action d-flex align-items-center px-0 py-2">
                                <span class="w-3 h-3 brround bg-success me-2"></span> Chưa xem
                            </a>
                            <a href="javascript:void(0);"
                                class="list-group-item list-group-item-action d-flex align-items-center px-0 py-2">
                                <span class="w-3 h-3 brround bg-danger me-2"></span> Khẩn
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-header border-bottom-0">
                        <h4 class="card-title">{{ $model->tieu_de }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="email-media">
                            <div class="mt-0 d-sm-flex">
                                <div class="media-body pt-0">
                                    <div class="float-end d-none d-md-flex fs-15">
                                        <small class="me-3 mt-1 text-muted">Sep 13 , 2021 12:45 pm</small>
                                        <a class="me-3" data-bs-toggle="tooltip" title=""
                                            data-original-title="Rated" data-bs-original-title=""><i
                                                class="ri-star-s-line"></i></a>
                                        <a class="me-3" data-bs-toggle="tooltip" title=""
                                            data-original-title="Reply" data-bs-original-title=""><i
                                                class="fa fa-reply"></i></a>
                                    </div>
                                    <div class="media-title text-dark font-weight-semibold mt-1">Người gửi: <span
                                            class=" font-weight-semibold">{{ $model->sendFrom }}</span></div>
                                    <small class="mb-0">Người nhận: {{ $model->sendTo }}</small>
                                    <small class="me-2 d-md-none">{{ $model->created_at->format('Y-m-d h:i:s') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="eamil-body mt-5">
                            <h6>Kính gửi: Anh/ Chị:</h6>
                            <p>{!! $model->noi_dung !!}</p>
                            <p class="mb-0">Trân trọng!</p>
                            <hr>
                            @if (!empty($model->dinh_kem))
                                @php $pdfFile = \App\Modules\Nhansu\Helpers\ThongBaoHelper::getPDFFile($model) @endphp
                                @if ($pdfFile)
                                    <iframe src="{{ $pdfFile }}" style="width:100%; height:1000px;"></iframe>
                                @endif
                                <div class="email-attch">
                                    <p class="font-weight-semibold">{{ count($model->dinh_kem) }} Tệp đính kèm</p>
                                </div>
                                <div class="row attachments-doc">
                                    @foreach ($model->dinh_kem as $file)
                                        <div class="col-xxl-4 col-xl-12 col-md-12 my-2">
                                            <div class="list-group-item  align-items-center">
                                                <div class="d-xl-flex">
                                                    <div class="dinhkem__item row">
                                                        <div class="col-4">
                                                            <img src="https://play-lh.googleusercontent.com/g2_mp6KE9sOiqfV2P3YEzqp6Zzuwfyu1rhVPbXzMmb42s2jCR9rt6nbo-m5j1Y0Ekw-Y=w240-h480-rw"
                                                                alt="img" class="avatar bg-transparent avatar-xl me-2">
                                                        </div>
                                                        <div class="col-8">
                                                            <a href="{{ asset('storage/' . $file) }}"
                                                                class="font-weight-semibold fs-14 ">{{ basename(asset('storage/' . $file)) }}<span
                                                                    class="text-muted ms-2">(23 KB)</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <div>
                            <div class="media-title text-dark font-weight-semibold mt-1">Người phản hồi: Trần Hậu Minh Tiến
                            </div>
                            <small class="mb-0">Thời gian: 04/10/2001 </small>
                            <div class="media-title text-dark font-weight-semibold mt-1">Nội dung:</div>
                            <p>Bị cáo đã nhận ra lỗi sai của mình, mong hội đồng xét xử giảm nhẹ tội để bị cáo nhận được sự
                                khoan hồng của pháp luật</p>
                            <div class="col-xxl-4 col-xl-12 col-md-12 my-2">
                                <div class="list-group-item  align-items-center">
                                    <div class="d-xl-flex">
                                        <div class="dinhkem__item row">
                                            <div class="col-4">
                                                <img src="https://play-lh.googleusercontent.com/g2_mp6KE9sOiqfV2P3YEzqp6Zzuwfyu1rhVPbXzMmb42s2jCR9rt6nbo-m5j1Y0Ekw-Y=w240-h480-rw"
                                                    alt="img" class="avatar bg-transparent avatar-xl me-2">
                                            </div>
                                            <div class="col-8">
                                                <a href=""
                                                    class="font-weight-semibold fs-14 ">phan-hoi.doc<span
                                                        class="text-muted ms-2">(23 KB)</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>-----------------------------------------------------------------------------------------------------------</p>
                        </div>
                        <a class="modal-effect btn btn-primary mt-1 mb-1" data-toggle="modal" data-target="#phanHoi"><i
                                class="fa fa-reply"></i> Phản hồi</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END ROW -->
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" id="phanHoi">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="card-header border-bottom-0">
                    <h3 class="card-title">PHẢN HỒI THÔNG BÁO</h3>
                </div>
                <form method="POST" action="{{ route('nhansu.thong-bao.phan-hoi') }}" enctype="multipart/form-data">
                    <input type="hidden" name="thong_bao_id" value="{{ $model->id }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row align-items-center">
                                <label class="col-sm-2 form-label">Phản hồi cho <span style="color: red">*</span>:</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-4"><input type="radio" name="nguoi_nhan" value="gui_toan_bo"
                                                checked />
                                            Phản hồi cho toàn bộ </div>
                                        <div class="col-8"><input type="radio" name="nguoi_nhan"
                                                value="gui_ca_nhan" />
                                            Phản hồi cho cá nhân</div>
                                    </div>
                                </div>
                            </div>
                            <div id="div1" class="d-none form-group">
                                <div class="row">
                                    <label class="col-sm-2 form-label">Người nhận: </label>
                                    <div class="col-sm-10">
                                        <div class="option exit-option req_place">
                                            <select
                                                data-placeholder="Chọn người nhận cá nhân"  class="form-control select2 " name="user_ids[]" multiple>
                                                @foreach($nhanVien as $nv)
                                                    <option value="{{$nv->user_id}}">{{$nv->ho_ten.' - '.$nv->phongBan->ten.' - '.$nv->chiNhanh->ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row ">
                                    <label class="col-sm-2 form-label">Nội dung <span style="color: red">*</span>:</label>
                                    <div class="col-sm-10">
                                        <textarea name="noi_dung" id="tiny2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <label class="col-sm-2 form-label">Đính kèm: </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" name="fileInput[]" multiple>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-sm-flex">
                            <div class="mt-2 mb-2">
                            </div>
                            <div class="btn-list ms-auto">
                                <button class="btn btn-danger btn-space">Hủy bỏ</button>
                                <button type="submit" class="btn btn-primary btn-space">Gửi phản hồi</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
