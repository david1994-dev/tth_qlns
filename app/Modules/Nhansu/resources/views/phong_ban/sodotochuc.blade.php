@extends('adminlte.Layout.app')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <p>Cấu hình sơ đồ tổ chức cho Khoa/ phòng: <b>{{ $phongBan->ten }}</b> -
                <b>{{ $phongBan->chiNhanh->ten }}</b></p>

        </div>
        <div class="box-body card">
            <div class="row">
                <div class="col-md-5">
                    <form method="POST"
                          action="{{!isset($model) ? route('nhansu.so-do-to-chuc.store') : route('nhansu.so-do-to-chuc.update', $model->id)}}">
                        @csrf
                        <input type="hidden" value="{{$phongBan->id}}" name="phong_ban_id" class="form-control">
                        <input type="hidden" value="{{$phongBan->chi_nhanh_id}}" name="chi_nhanh_id"
                               class="form-control">
                        @if(isset($model))
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" value="{{$model->id}}" name="so_do_to_chuc_id" class="form-control">
                        @endif
                        <div class="card-body">
                            <div class="form-group">
                                <label>Thuộc cấp dưới của</label>
                                <select name="parent_id" class="form-control" @if(isset($model)) disabled @endif>
                                    <option value="0">------</option>
                                    @foreach($soDoToChuc as $viTri)
                                        <option @if(isset($model) && $model->parent_id == $viTri->id) selected
                                                @endif value="{{$viTri->id}}">{{$viTri->ma_vi_tri}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mã Vị trí</label>
                                <input type="text" value="{{isset($model) ? $model->ma_vi_tri : old('ma_vi_tri')}}"
                                       name="ma_vi_tri" class="form-control" required>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-7">
                    <div class="p-3">
                        @php
                            $parent = $soDoToChuc->filter(function ($value, $key) {
                                return $value->parent_id == 0;
                            });
                        @endphp
                        <ol class="rectangle-list">
                            @foreach($parent as $menu)
                                @php
                                    $children =  $soDoToChuc->filter(function ($value, $key) use ($menu) {
                                        return $value->parent_id == $menu->id;
                                    });
                                @endphp
                                <li>
                                    <div>{{$menu->ma_vi_tri}} <a
                                            href="{{route('nhansu.so-do-to-chuc.edit', $menu->id)}}"
                                            class="btn btn-info btn-sm">sửa</a> <a
                                            data-delete-url="{{route('nhansu.so-do-to-chuc.destroy', $menu->id)}}"
                                            class="btn btn-danger btn-sm delete-button">xóa</a></div>
                                </li>
                                @if(count($children))
                                    @include('Nhansu::components.sodotochuc', ['children' => $children, 'soDoToChuc' => $soDoToChuc])
                                @endif
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('styles')
    <style>
        .rectangle-list div {
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

        .rectangle-list div:hover {
            background: #eee;
        }

        .rectangle-list div:before {
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

        .rectangle-list div:after {
            position: absolute;
            content: '';
            border: .5em solid transparent;
            left: -1em;
            top: 50%;
            margin-top: -.5em;
            transition: all .3s ease-out;
        }

        .rectangle-list div:hover:after {
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

        ol ul{
            margin: 0 0 0 2em;
            /* Add some left margin for inner lists */
        }
    </style>
@stop
