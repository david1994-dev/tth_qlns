<ul>
    @foreach($children as $child)
        @php
            $subChild = $soDoToChuc->filter(function ($value) use ($child) {
                                return $value->parent_id == $child->id;
                            });
        @endphp
        <li><div>{{$child->ma_vi_tri}} <a href="{{route('nhansu.khoaphongban.sodotochuc.edit', [$child->id, $child->phong_ban_id])}}" class="btn btn-info btn-sm" >sửa</a>  <a href="{{route('nhansu.khoaphongban.sodotochuc.delete', $child->id)}}" class="btn btn-danger btn-sm" >xóa</a></div></li>
            @if(count($subChild))
                @include('Nhansu::includes.sodotochuc', ['children' => $subChild, 'soDoToChuc' => $soDoToChuc])
            @endif
    @endforeach
</ul>
