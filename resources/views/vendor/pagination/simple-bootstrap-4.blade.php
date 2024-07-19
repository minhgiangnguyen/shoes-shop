@if ($paginator->hasPages())
<nav>
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true">
            <span class="page-link">@lang('pagination.previous')</span>
        </li>
        <!-- <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span class="page-link" aria-hidden="true">&laquo;</span>
        </li> -->
        @else
        <li class="page-item">
            <a class="page-link" data-pjax href="{{ $paginator->previousPageUrl() }}"
                rel="prev">@lang('pagination.previous')</a>
        </li>
        <!-- <li class="page-item">
            <a class="page-link prev-arrow" data-pjax href="{{ $paginator->previousPageUrl() }}" rel="prev"
                aria-label="@lang('pagination.previous')"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
        </li> -->
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" data-pjax href="{{ $paginator->nextPageUrl() }}"
                rel="next">@lang('pagination.next')</a>
        </li>
        <!-- <li>
            <a href="{{ $paginator->nextPageUrl() }}" data-pjax rel="next" aria-label="@lang('pagination.next')"><i
                    class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        </li> -->
        @else
        <li class="page-item disabled" aria-disabled="true">
            <span class="page-link">@lang('pagination.next')</span>
        </li>
        <!-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span aria-hidden="true">&raquo;</span>
        </li> -->
        @endif
    </ul>
</nav>
@endif