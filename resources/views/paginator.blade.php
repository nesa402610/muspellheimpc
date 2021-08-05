<div id="paginator">
    @if (!$paginate->onFirstPage())
    <div>
        <a href="{{ $paginate->url(1) }}">Первая страница</a>
    </div>
    <div>
        <a href="{{ $paginate->previousPageUrl() }}">Предыдущая</a>
    </div>
    @endif
    <div>
        <a class="baka">Текущая страница {{ $paginate->currentPage() }}</a>
    </div>
    <div>
        <a href="{{ $paginate->nextPageUrl() }}">Следующая страница</a>
    </div>
    <div>
        <a href="">Послденяя страница {{ $paginate->lastPage() }}</a>
    </div>
        @foreach ($paginate->getUrlRange(1, 3) as $a)
            {{ $a }}
        @endforeach
</div>
