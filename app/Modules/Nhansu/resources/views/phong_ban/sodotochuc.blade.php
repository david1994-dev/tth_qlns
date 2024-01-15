@extends('adminlte.Layout.app')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <p>Cấu hình sơ đồ tổ chức cho Khoa/ phòng: <b>{{ $model->ten }}</b>  - <b>{{ $model->chiNhanh->ten }}</b></p>

        </div>
        <div class="box-body card">
            <div class="row">
                <div class="col-md-5">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Thuộc cấp dưới của</label>
                            <select name="chi_nhanh_id" id="" class="form-control">
                                <option value="">------</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mã Vị trí</label>
                            <input type="text" name="ma" class="form-control" required>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>


                </div>
                <div class="col-md-7">
                    <div class="p-3">
                        <ol class="rectangle-list">
                            <li><a href="#">Trưởng Phòng - ABC <span class="btn btn-info btn-sm" >sửa</span>  <span class="btn btn-danger btn-sm" >xóa</span></a></li>
                            <ol>
                                <li><a href="#">Chuyên viên trưởng 1 - ABC <span class="btn btn-info btn-sm" >sửa</span>  <span class="btn btn-danger btn-sm" >xóa</span></a>
                                    <ol>
                                        <li><a href="#">Nhân sự 1 <span class="btn btn-info btn-sm" >sửa</span>  <span class="btn btn-danger btn-sm" >xóa</span></a></li>
                                        <li><a href="#">Nhân sự 2 <span class="btn btn-info btn-sm" >sửa</span>  <span class="btn btn-danger btn-sm" >xóa</span></a></li>
                                        <li><a href="#">Nhân sự 3  <span class="btn btn-info btn-sm" >sửa</span>  <span class="btn btn-danger btn-sm" >xóa</span>  </a> </li>
                                    </ol>
                                </li>
                                <li><a href="#">Chuyên viên trưởng 2 - ABC <span class="btn btn-info btn-sm" >sửa</span>  <span class="btn btn-danger btn-sm" >xóa</span></a>
                                    <ol>
                                        <li><a href="#">Nhân sự 5 <span class="btn btn-info btn-sm" >sửa</span>  <span class="btn btn-danger btn-sm" >xóa</span></a></li>
                                        <li><a href="#">Nhân sự 6 <span class="btn btn-info btn-sm" >sửa</span>  <span class="btn btn-danger btn-sm" >xóa</span></a></li>
                                        <li><a href="#">Nhân sự 7 <span class="btn btn-info btn-sm" >sửa</span>  <span class="btn btn-danger btn-sm" >xóa</span></a></li>
                                    </ol>
                                </li>

                            </ol>
                        </ol>

                    </div>
                </div>
            </div>


        </div>

    </div>


@stop


@section('scripts')
    <style>
        .rectangle-list a {
            position: relative;
            display: block;
            padding: .4em .4em .4em .8em;
            *padding: .4em;
            margin: .5em 0 .5em 2.5em;
            background: #ddd;
            color: #444;
            text-decoration: none;
            transition: all .3s ease-out;
        }

        .rectangle-list a:hover {
            background: #eee;
        }

        .rectangle-list a:before {
            content: counter(li);
            counter-increment: li;
            position: absolute;
            left: -2.5em;
            top: 50%;
            margin-top: -1em;
            background: #fa8072;
            height: 2em;
            width: 2em;
            line-height: 2em;
            text-align: center;
            font-weight: bold;
        }

        .rectangle-list a:after {
            position: absolute;
            content: '';
            border: .5em solid transparent;
            left: -1em;
            top: 50%;
            margin-top: -.5em;
            transition: all .3s ease-out;
        }

        .rectangle-list a:hover:after {
            left: -.5em;
            border-left-color: #fa8072;
        }

        ol {
            counter-reset: li;
            /* Initiate a counter */
            list-style: none;
            /* Remove default numbering */
            *list-style: decimal;
            /* Keep using default numbering for IE6/7 */
            font: 15px 'trebuchet MS', 'lucida sans';
            padding: 0;

            text-shadow: 0 1px 0 rgba(255, 255, 255, .5);
        }

        ol ol {
            margin: 0 0 0 2em;
            /* Add some left margin for inner lists */
        }
    </style>
@stop
