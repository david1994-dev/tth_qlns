<ul>
    @foreach($children as $child)
        @php
            $subChild = $soDoToChuc->filter(function ($value) use ($child) {
                                return $value->parent_id == $child->id;
                            });
        @endphp
        <li>
            <div>{{$child->ma_vi_tri}} <a
                    href="{{route('nhansu.so-do-to-chuc.edit', $child->id)}}"
                    class="btn btn-info btn-sm">sửa</a> <a
                    data-delete-url="{{route('nhansu.so-do-to-chuc.destroy', $child->id)}}" class="btn btn-danger btn-sm delete-button">xóa</a>
            </div>
        </li>
        @if(count($subChild))
            @include('Nhansu::components.sodotochuc', ['children' => $subChild, 'soDoToChuc' => $soDoToChuc])
        @endif
    @endforeach
</ul>
