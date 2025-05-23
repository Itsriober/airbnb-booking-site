@if ($paginator->hasPages())
<nav class="inner-pagination-area">
    <ul class="pagination-list">
        @if ($paginator->onFirstPage())
        <li class="disabled">
            <span class="shop-pagi-btn" tabindex="-1"><i class="bi bi-chevron-left"></i></span>
        </li>
        @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}" class="shop-pagi-btn" tabindex="-1"><i class="bi bi-chevron-left"></i></a>
        </li>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li class="disabled"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active" aria-current="page">
                        <span>{{ $page }}</span>
                    </li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach
    
    @if ($paginator->hasMorePages())
    <li><a class="shop-pagi-btn" href="{{ $paginator->nextPageUrl() }}"><i class="bi bi-chevron-right"></i></a>
    </li>
@else
    <li class="disabled"><span class="shop-pagi-btn"
            href="{{ $paginator->nextPageUrl() }}"><i class="bi bi-chevron-right"></i></span></li>
@endif
    </ul>
</nav>
@endif
