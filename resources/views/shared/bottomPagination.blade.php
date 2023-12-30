<div class="text-center">
    <ul class="pagination">
        @if (isset($firstPageLink))
            <li><a href="{!! $firstPageLink !!}" class="page-link"> << </a></li>
        @else
            <li class="page-item disabled"><a class="page-link"> << </a></li>
        @endif
        @foreach ($pages as $page)
            @if ($page['current'])
                <li class="page-item active"><a class="page-link">{{ $page['number'] }}</a></li>
            @else
                <li class="page-item "><a class="page-link" href="{!! $page['link'] !!}">{{ $page['number'] }}</a></li>
            @endif
        @endforeach
        @if (isset($lastPageLink))
            <li><a href="{!! $lastPageLink !!}" class="page-link"> >> </a></li>
        @else
            <li class="page-item disabled"><a class="page-link"> >> </a></li>
        @endif
    </ul>
</div>
