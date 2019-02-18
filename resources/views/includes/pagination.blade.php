<!-- Pagination -->
<nav class="pagination is-centered" role="navigation" aria-label="pagination">
    <a class="pagination-previous pagination-nav button mx-0" disabled="true">
                <span
                    class="pagination-nav__icon"><?= file_get_contents(asset('/svg/icons/ic_arrow_right.svg')) ?></span>
        <span class="pagination-nav__title">Предыдущая страница</span>
    </a>
    <a class="pagination-next pagination-nav button is-info mx-0">
        <span class="pagination-nav__title">Следующая страница</span>
        <span
            class="pagination-nav__icon"><?= file_get_contents(asset('/svg/icons/ic_arrow_right.svg')) ?></span>
    </a>
    <ul class="pagination-list">
        <li><a class="pagination-link is-current" aria-label="Goto page 1">1</a></li>
        <li><a class="pagination-link" aria-label="Goto page 2">2</a></li>
        <li><a class="pagination-link" aria-label="Goto page 3">3</a></li>
        <li><a class="pagination-link" aria-label="Goto page 4">4</a></li>
    </ul>
</nav>
