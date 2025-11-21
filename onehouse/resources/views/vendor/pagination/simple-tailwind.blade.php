@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{!! __('Pagination Navigation') !!}" class="pagination-gap">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="pagination-next">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-nav">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination-nav">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span class="pagination-next">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
