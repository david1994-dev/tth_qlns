@extends('adminlte.Layout.app')

@section('metadata')
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('title')
@stop

@section('header')
@stop

@section('breadcrumb')
@stop

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if ($errors->count())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $e)
                            <li>{!! $e !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($message = session('error'))
                <div class="alert alert-danger alert-block">
                    {!! $message !!}
                </div>
            @endif
            @if ($message = session('success'))
                <div class="alert alert-success alert-block">
                    {!! $message !!}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Tạo Chi Nhánh
                    </h3>
                </div>

                <form action="{{route('nhansu.chi-nhanh.store')}}" method="post">
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
