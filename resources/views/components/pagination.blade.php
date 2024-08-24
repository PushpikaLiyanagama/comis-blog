@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true">
                    <span>&laquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true">
                        <span>{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page">
                                <span>{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true">
                    <span>&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif

<style>
    .pagination {
        display: flex;
        justify-content: center;
        padding-left: 0;
        list-style: none;
        border-radius: 0.25rem;
    }

    .pagination li {
        margin: 0 5px; 
    }

    .pagination li a,
    .pagination li span {
        color: #ffcc00; 
        padding: 5px 10px;
        text-decoration: none;
        border-radius: 4px;
        border: 1px solid #ffcc00; 
    }

    .pagination li a:hover {
        background-color: #fff3cd; 
        border-color: #ffcc00;
    }

    .pagination li.active span {
        background-color: #ffcc00; 
        color: #000; 
        border-color: #ffcc00;
    }

    .pagination li.disabled span,
    .pagination li.disabled a {
        color: #FF0000; 
    }
</style>
