@if ($paginator->hasPages())
<nav>
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <!-- <span aria-hidden="true">&laquo;</span> -->
        </li>
        @else
        <li>
            <a class="prev-arrow" data-pjax href="{{ $paginator->previousPageUrl() }}" rel="prev"
                aria-label="@lang('pagination.previous')"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
        @else
        <li><a href="{{ $url }}" data-pjax rel="page-{{ $page }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}" data-pjax rel="next" aria-label="@lang('pagination.next')"><i
                    class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        </li>
        @else
        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span aria-hidden="true">&raquo;</span>
        </li>
        @endif
    </ul>
</nav>
@endif