@extends('adminlte.Layout.app')

@section('metadata')
@stop

@section('styles')
    <style>
        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        input:invalid {
            border-color: red;
        }

        input:valid {
            border-color: green;
        }
    </style>
@stop


@section('title')
@stop

@section('header')
@stop

@section('breadcrumb')
@stop

@section('content')
<div class="container-fluid">
    <h2 class="text-center fw-bold">THÊM MỚI NHÂN VIÊN</h2>
        <form class="border border-2 border-success p-3 rounded">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="maNV">Mã Nhân Viên: </label>
                    <input type="text" class="form-control" id="maNV">
                </div>
                <div class="form-group col-md-3">
                    <label for="tenNV">Họ và tên: </label>
                    <input type="text" class="form-control" id="tenNV">
                </div>
                <div class="form-group col-md-3">
                    <label for="maNV">Mã Nhân Viên: </label>
                    <input type="text" class="form-control" id="maNV">
                </div>
                <div class="form-group col-md-3">
                    <label for="tenNV">Họ và tên: </label>
                    <input type="text" class="form-control" id="tenNV">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="loaiHoSo">Loại Hồ Sơ:
                    </label>
                    <input type="text" class="form-control" id="loaiHoSo">
                </div>
                <div class="form-group col-md-6">
                    <label for="gioiTinh">Giới Tính: </label>
                    <div class="d-flex">
                        <label class="d-block me-4">
                            <input type="radio" value="1" name="gioiTinh" checked >
                             Nam
                             <i class="bi bi-gender-male"></i>
                        </label>
                        <label class="d-block" style="margin-left: 50px">
                            <input type="radio" value="0" name="gioiTinh" > Nữ
                            <i class="bi bi-gender-female"></i>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Address 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip">
                </div>
            </div>
            <div class="mt-3 text-center">
                <button class="btn btn-info btn-outline-success btn-sm border border-2 border-success text-dark">
                    -- Save <i class="fa-solid fa-floppy-disk"></i> --
                </button>
            </div>
        </form>
</div>

@stop
