@php
    $request = request()->all();

    if (isset($request['page'])) {
        unset($request['page']);
    }
    $extUrl= '';
    if($requestQuery = http_build_query($request)) {
        $extUrl = '&' . http_build_query($request);
    }
@endphp
@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span class="page-link"><i class="fa fa-angle-left"></i></span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() . $extUrl}}" rel="prev"><i class="fa fa-angle-left"></i></a></li>
        @endif

        @if($paginator->currentPage() > 3)
            <li class="hidden-xs"><a class="page-link" href="{{ $paginator->url(1). $extUrl }}">1</a></li>
        @endif
        @if($paginator->currentPage() > 4)
            <li class="disabled hidden-xs"><span class="page-link">...</span></li>
        @endif
        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                @if ($i == $paginator->currentPage())
                    <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $paginator->url($i). $extUrl }}">{{ $i }}</a></li>
                @endif
            @endif
        @endforeach
        @if($paginator->currentPage() < $paginator->lastPage() - 3)
            <li class="disabled hidden-xs"><span class="page-link">...</span></li>
        @endif
        @if($paginator->currentPage() < $paginator->lastPage() - 4)
            <li class="hidden-xs"><a class="page-link" href="{{ $paginator->url($paginator->lastPage()). $extUrl }}">{{ $paginator->lastPage() }}</a></li>
        @endif

        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() . $extUrl}}" rel="next"><i class="fa fa-angle-right"></i></a></li>
        @else
            <li class="page-item"><span class="page-link"><i class="fa fa-angle-right"></i></span></li>
        @endif
    </ul>
@endif
