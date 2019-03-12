<!-- Pagination -->
<nav class="pagination is-centered" role="navigation" aria-label="pagination">
    @if($reviews->currentPage() > 1 && $reviews->lastPage() > 1)
        <a href="{{ Request::url() . '?page=' . ($reviews->currentPage() - 1) }}"
           class="pagination-previous pagination-nav button is-info mx-0"
        >
            <span class="pagination-nav__icon">{!! file_get_contents(asset('/svg/icons/ic_arrow_right.svg')) !!}</span>
            <span class="pagination-nav__title">Предыдущая страница</span>
        </a>
    @else
        <a class="pagination-previous pagination-nav button is-info mx-0" disabled="true" >
            <span class="pagination-nav__icon">{!! file_get_contents(asset('/svg/icons/ic_arrow_right.svg')) !!}</span>
            <span class="pagination-nav__title">Предыдущая страница</span>
        </a>
    @endif

    @if($reviews->currentPage() !== $reviews->lastPage())
        <a href="{{ Request::url() . '?page=' . ($reviews->currentPage() + 1) }}"
           class="pagination-next pagination-nav button is-info mx-0">
            <span class="pagination-nav__title">Следующая страница</span>
            <span class="pagination-nav__icon">{!! file_get_contents(asset('/svg/icons/ic_arrow_right.svg')) !!}</span>
        </a>
    @else
        <a class="pagination-next pagination-nav button is-info mx-0" disabled="true">
            <span class="pagination-nav__title">Следующая страница</span>
            <span class="pagination-nav__icon">{!! file_get_contents(asset('/svg/icons/ic_arrow_right.svg')) !!}</span>
        </a>
    @endif
    <ul class="pagination-list">
        @for($i=1; $i <= $reviews->lastPage(); $i++)
            @if($i === $reviews->currentPage())
                <li><a class="pagination-link is-current" aria-label="Goto page {{ $i }}">{{ $i }}</a></li>
            @else
                <li><a href="{{ Request::url() . '?page=' . $i }}" class="pagination-link" aria-label="Goto page {{ $i }}">{{ $i }}</a></li>
            @endif
        @endfor
    </ul>
</nav>
