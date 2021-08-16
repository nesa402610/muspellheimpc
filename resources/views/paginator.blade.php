@if ($paginate->hasPages())
    <div id="paginator">
        @if (!$paginate->onFirstPage())
            <div>
                <a href="{{ $paginate->url(1) }}">Первая страница</a>
            </div>
            <div>
                <a href="{{ $paginate->previousPageUrl() }}">
                    << </a>
            </div>
        @else
            <div>
                <a class="disabled">Первая страница</a>
            </div>
            <div>
                <a class="disabled">
                    << </a>
            </div>
        @endif
        @if ($paginate->currentPage() >= 3)
            <div>
                <a href="{{ $paginate->url($paginate->currentPage() - 2) }}">{{ $paginate->currentPage() - 2 }}</a>
            </div>
        @endif
        @if ($paginate->currentPage() >= 2)
            <div>
                <a href="{{ $paginate->url($paginate->currentPage() - 1) }}">{{ $paginate->currentPage() - 1 }}</a>
            </div>
        @endif
        <div>
            <a class="baka">{{ $paginate->currentPage() }}</a>
        </div>
        @if ($paginate->currentPage() !== $paginate->lastPage() && $paginate->currentPage() <= $paginate->lastPage() -2)
            <div>
                <a href="{{ $paginate->url($paginate->currentPage() + 1) }}">{{ $paginate->currentPage() + 1 }}</a>
            </div>
            <div>
                <a href="{{ $paginate->url($paginate->currentPage() + 2) }}">{{ $paginate->currentPage() + 2 }}</a>
            </div>
        @elseif ($paginate->currentPage() == $paginate->lastPage() -1)
            <div>
                <a
                    href="{{ $paginate->url($paginate->currentPage() + 1) }}">{{ $paginate->currentPage() + 1 }}</a>
            </div>
        @endif
        @if ($paginate->currentPage() !== $paginate->lastPage())
            <div>
                <a href="{{ $paginate->nextPageUrl() }}">>></a>
            </div>
            <div>
                <a href="{{ $paginate->url($paginate->lastPage()) }}">Последняя страница</a>
            </div>
        @else
            <div>
                <a class="disabled">>></a>
            </div>
            <div>
                <a class="disabled">Последняя страница</a>
            </div>
        @endif
    </div>
@endif
