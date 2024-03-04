@foreach($loaiThongBao as $ltb)
    <a href="{{route('nhansu.thong-bao.index').'?category='.$ltb->id}}" class="list-group-item d-flex align-items-center ">
        <span class="icons"><i class="{{$ltb->icon}}"></i></span>{{$ltb->ten}}<span
            class="ms-auto badge badge-success">{{\Illuminate\Support\Arr::get($thongBaoUnreadByType, $ltb->id, 0)}}</span>
    </a>
@endforeach
