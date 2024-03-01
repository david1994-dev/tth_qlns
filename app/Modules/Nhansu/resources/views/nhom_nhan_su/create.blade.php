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
                                <input type="text" class="form-control" id="ma" placeholder="Nhập mã...">
                            </div>
                            <div class="form-group">
                                <label for="ten" class="form-label">Tên:</label>
                                <input type="text" class="form-control" id="ten" placeholder="Nhập tên...">
                            </div>
                            <div class="form-group">
                                <label class=" form-label">Chọn Nhân Sự:</label>
                                <div class="option exit-option">
                                    <select class="jsSelectNV form-control select2" name="user_ids[]" multiple></select>
                                </div>
                            </div>
                            <a type="submit" class="btn btn-primary ">Submit</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Tạo Nhóm Nhân Sự
                    </h3>
                </div>
                <form action="{{route('nhansu.nhom-nhan-su.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã</label>
                                <input type="text" name="ma" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
                                <input type="text" name="ten" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-5">
                                    <label class="form-label mb-0 ">Chọn Nhân Sự:</label>
                                </div>
                                <div class="col-xl-7">
                                    <div class="option exit-option">
                                            <select class="jsSelectNV form-control select2" name="user_ids[]" multiple></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div> --}}
    {{-- <div class="col-md-6">
    </div>  --}}
    </div>
@stop
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.jsSelectNV').select2({
                ajax: {
                    url: '{!! route('nhansu.nhan-vien.searchAjax') !!}',
                    dataType: 'json',
                    delay: 300,
                    data: function(params) {
                        return query = {
                            search: params.term,
                            page: params.page
                        }
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;

                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 50) < data.count
                            }
                        };
                    },
                    cache: true
                },
                placeholder: 'Nhập mã hoặc họ tên nhân viên...',
                minimumInputLength: 1,
            })
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
        });
    </script>
@stop
