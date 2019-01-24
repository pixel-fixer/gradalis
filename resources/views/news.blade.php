@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <!-- Section business -->
    <section class="section section-list-objects pt-1">
        <div class="container">
            <div class="columns">
                <div class="column is-4">
                    <aside>
                        <nav class="aside-nav">
                            <h3>Категории</h3>
                            <ul>
                                <li class="aside-nav__item">
                                    <a href="#">
                                        <span class="aside-nav__item__title">Финансовая аналитика</span>
                                        <span class="aside-nav__item__count">24</span>
                                    </a>
                                </li>
                                <li class="aside-nav__item">
                                    <a href="#">
                                        <span class="aside-nav__item__title">Новости</span>
                                        <span class="aside-nav__item__count">129</span>
                                    </a>
                                </li>
                                <li class="aside-nav__item">
                                    <a href="#">
                                        <span class="aside-nav__item__title">Обновления</span>
                                        <span class="aside-nav__item__count">5</span>
                                    </a>
                                </li>
                                <li class="aside-nav__item">
                                    <a href="#">
                                        <img src="{{ asset('/svg/icons/ic_advice.svg') }}" class="svg" alt="Advice">
                                        <span class="aside-nav__item__title">Полезные советы</span>
                                        <span class="aside-nav__item__count">12</span>
                                    </a>
                                </li>
                                <li class="aside-nav__item">
                                    <a href="#">
                                        <img src="{{ asset('/svg/icons/ic_videoreviews.svg') }}" class="svg" alt="Video">
                                        <span class="aside-nav__item__title">Видеообзоры</span>
                                        <span class="aside-nav__item__count">69</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="card card-object card-object_promo">
                            <div class="card-image">
                                <figure class="image is-16by9">
                                    <img
                                        src="http://sadovnick.ru/upload/iblock/985/985dec2d14c8f7cdf99f99f2da44fcf6.jpg"
                                        alt="Placeholder image">
                                </figure>
                                <span class="tag tag-payback">
                            <span class="name">окупаемость</span>
                            <span class="term">38 месяцев</span>
                        </span>
                                <span class="info-icon object-promo">
                            <img src="{{ asset('/svg/icons/ic_recommended.svg') }}" alt="Recommended">
                        </span>
                                <a href="#" class="info-icon object-favorite" v-tooltip="'Добавить в избранное'">
                                    <img src="{{ asset('/svg/icons/ic_favorites_white.svg') }}" alt="Fav">
                                </a>

                            </div>
                            <div class="card-content">
                                <div class="card-object__header">
                                    <h3 class="title">Мини-отель в собственность с видом на Невский проспект</h3>
                                    <p class="location"><img src="{{ asset('/svg/icons/ic_location.svg') }}"
                                                             alt="Fav"><span>Россия, г. Санкт-Петербург</span>
                                    </p>
                                </div>

                                <div class="content card-object__content">
                                    <div class="list-properties">
                                        <div class="list-properties__item">
                                            <span>Категория</span>
                                            <span>Коммерческая</span>
                                        </div>
                                        <div class="list-properties__item">
                                            <span>Выручка</span>
                                            <span><b>$48 000</b></span>
                                        </div>
                                        <div class="list-properties__item">
                                            <span>Прибыль</span>
                                            <span><b>$23 000</b></span>
                                        </div>
                                        <div class="list-properties__item">
                                            <span>Доходность</span>
                                            <span><b>78%</b></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-object__footer">
                                    <div class="price-info">
                                        <div class="price">$18 000 560</div>
                                    </div>
                                    <a class="button is-success is-outlined is-fullwidth has-text-weight-bold">Подробнее
                                        о
                                        бизнесе</a>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="column is-8">
                    <main>
                        <h1 class="section-title">Последние новости</h1>

                        <div class="card-news-list columns is-multiline">
                            <div class="column is-6">
                                <article class="card-news">
                                    <figure class="card-news__thumb">
                                        <img
                                            src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                            alt="">
                                    </figure>
                                    <div class="card-news__tags">
                                        <a href="#" class="news-tag-cat">Новости</a>
                                    </div>
                                    <h3 class="card-news__title title">Председатель Федеральной резервной системы
                                        поддержал
                                        рубль</h3>
                                    <div class="card-news__excerpt">
                                        Курс доллара в четверг падал ниже 66 рублей, евро подбирался к 75 рублям
                                    </div>
                                </article>
                            </div>
                            <div class="column is-6">
                                <article class="card-news">
                                    <figure class="card-news__thumb">
                                        <img
                                            src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                            alt="">
                                    </figure>
                                    <div class="card-news__tags">
                                        <a href="#" class="news-tag-cat is-danger">
                                            <img src="{{ asset('/svg/icons/ic_videoreviews.svg') }}" class="svg"
                                                 alt="Videoreviews">
                                            <span>Видеообзоры</span>
                                        </a>
                                    </div>
                                    <h3 class="card-news__title title">Председатель Федеральной резервной системы
                                        поддержал
                                        рубль</h3>
                                    <div class="card-news__excerpt">
                                        Курс доллара в четверг падал ниже 66 рублей, евро подбирался к 75 рублям
                                    </div>
                                </article>
                            </div>
                            <div class="column is-6">
                                <article class="card-news">
                                    <figure class="card-news__thumb">
                                        <img
                                            src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                            alt="">
                                    </figure>
                                    <div class="card-news__tags">
                                        <a href="#" class="news-tag-cat is-success">
                                            <img src="{{ asset('/svg/icons/ic_advice.svg') }}" class="svg" alt="Advice">
                                            <span>Полезные советы</span>
                                        </a>
                                    </div>
                                    <h3 class="card-news__title title">Председатель Федеральной резервной системы
                                        поддержал
                                        рубль</h3>
                                    <div class="card-news__excerpt">
                                        Курс доллара в четверг падал ниже 66 рублей, евро подбирался к 75 рублям
                                    </div>
                                </article>
                            </div>
                            <div class="column is-6">
                                <article class="card-news">
                                    <figure class="card-news__thumb">
                                        <img
                                            src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                            alt="">
                                    </figure>
                                    <div class="card-news__tags">
                                        <a href="#" class="news-tag-cat">Новости</a>
                                    </div>
                                    <h3 class="card-news__title title">Председатель Федеральной резервной системы
                                        поддержал
                                        рубль</h3>
                                    <div class="card-news__excerpt">
                                        Курс доллара в четверг падал ниже 66 рублей, евро подбирался к 75 рублям
                                    </div>
                                </article>
                            </div>
                        </div>
                        <!-- Pagination -->
                        <nav class="pagination is-centered" role="navigation" aria-label="pagination">
                            <a class="pagination-previous pagination-nav button" disabled="true">
                            <span
                                class="pagination-nav__icon"><?= file_get_contents(asset('/svg/icons/ic_arrow_right.svg')) ?></span>
                                <span class="pagination-nav__title">Предыдущая страница</span>
                            </a>
                            <a class="pagination-next pagination-nav button is-link">
                                <span class="pagination-nav__title">Следующая страница</span>
                                <span
                                    class="pagination-nav__icon"><?= file_get_contents(asset('/svg/icons/ic_arrow_right.svg')) ?></span></a>
                            <ul class="pagination-list">
                                <li><a class="pagination-link is-current" aria-label="Goto page 1">1</a></li>
                                <li><a class="pagination-link" aria-label="Goto page 2">2</a></li>
                                <li><a class="pagination-link" aria-label="Goto page 3">3</a></li>
                                <li><a class="pagination-link" aria-label="Goto page 4">4</a></li>
                            </ul>
                        </nav>
                    </main>
                </div>
            </div>
        </div>
    </section>
@endsection
