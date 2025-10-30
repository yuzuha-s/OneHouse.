<div class="pagenate-wrapper">

    @if ($paginator->hasPages())

        <nav class="flex justify-center">
            <ul  class="flex space-x-4">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" height="60px"
                                viewBox="0 -960 960 960" width="60px" fill="#8C8C8C">
                                <path d="M480-545.33 287.33-352.67 240-400l240-240 240 240-47.33 47.33L480-545.33Z" />
                            </svg></span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><svg
                                xmlns="http://www.w3.org/2000/svg" height="60px" viewBox="0 -960 960 960"
                                width="60px" fill="#8C8C8C">
                                <path d="M480-545.33 287.33-352.67 240-400l240-240 240 240-47.33 47.33L480-545.33Z" />
                            </svg></a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    {{-- @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                {{-- <li class="active" aria-current="page"><span>{{ $page }}</span></li> --}}
                            {{-- @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif --}} 
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> <svg
                                xmlns="http://www.w3.org/2000/svg" height="60px" viewBox="0 -960 960 960"
                                width="60px" fill="#8C8C8C">
                                <path d="M480-344 240-584l47.33-47.33L480-438.67l192.67-192.66L720-584 480-344Z" />
                            </svg></a>
                    </li>
                @else
                    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span aria-hidden="true"> <svg xmlns="http://www.w3.org/2000/svg" height="60px"
                                viewBox="0 -960 960 960" width="60px" fill="#8C8C8C">
                                <path d="M480-344 240-584l47.33-47.33L480-438.67l192.67-192.66L720-584 480-344Z" />
                            </svg></span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</div>
