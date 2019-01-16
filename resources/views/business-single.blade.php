@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <div class="object">
        <!-- Section object header -->
        <section class="section pt-1">
            <div class="container">
                <div class="object__header">
                    <h1 class="section-title">Мини-отель в собственность с видом на Невский проспект</h1>
                    <div class="object__header__info">
                        <ul>
                            <li>ID Объекта: 454435</li>
                            <li>24 марта 2019</li>
                            <li>176 просмотров</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section object header -->
        <section class="section is-paddingless">
            <div class="container">
                <div class="object__body">
                    <div class="object__slider">
                        <!-- Swiper -->
                        <div class="swiper-container gallery-top swiper-object-main">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"
                                     style="background-image:url(http://lorempixel.com/1200/1200/nature/1/)"></div>
                                <div class="swiper-slide"
                                     style="background-image:url(http://lorempixel.com/1200/1200/nature/2/)"></div>
                                <div class="swiper-slide"
                                     style="background-image:url(http://lorempixel.com/1200/1200/nature/3/)"></div>
                                <div class="swiper-slide"
                                     style="background-image:url(http://lorempixel.com/1200/1200/nature/4/)"></div>
                                <div class="swiper-slide"
                                     style="background-image:url(http://lorempixel.com/1200/1200/nature/5/)"></div>
                                <div class="swiper-slide"
                                     style="background-image:url(http://lorempixel.com/1200/1200/nature/6/)"></div>
                                <div class="swiper-slide"
                                     style="background-image:url(http://lorempixel.com/1200/1200/nature/7/)"></div>
                                <div class="swiper-slide"
                                     style="background-image:url(http://lorempixel.com/1200/1200/nature/8/)"></div>
                                <div class="swiper-slide"
                                     style="background-image:url(http://lorempixel.com/1200/1200/nature/10/)"></div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next swiper-button-white"></div>
                            <div class="swiper-button-prev swiper-button-white"></div>
                        </div>
                        <div class="swiper-container gallery-thumbs swiper-object-thumbs">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"
                                     style="background-image:url(http://lorempixel.com/1200/1200/nature/1/)"></div>
                                <div class="swiper-slide"
                                     style="background-image:url(http://lorempixel.com/1200/1200/nature/2/)"></div>
                                <div class="swiper-slide"
                                     style="background-image:url(http://lorempixel.com/1200/1200/nature/3/)"></div>
                                <div class="swiper-slide"
                                     style="background-image:url(http://lorempixel.com/1200/1200/nature/4/)"></div>
                                <div class="swiper-slide"
                                     style="background-image:url(http://lorempixel.com/1200/1200/nature/5/)"></div>
                                <div class="swiper-slide"
                                     style="background-image:url(http://lorempixel.com/1200/1200/nature/6/)"></div>
                                <div class="swiper-slide"
                                     style="background-image:url(http://lorempixel.com/1200/1200/nature/7/)"></div>
                                <div class="swiper-slide"
                                     style="background-image:url(http://lorempixel.com/1200/1200/nature/8/)"></div>
                                <div class="swiper-slide"
                                     style="background-image:url(http://lorempixel.com/1200/1200/nature/10/)"></div>
                            </div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-8">
                            <div class="content">
                                <h2>Описание объекта</h2>
                                <p>
                                    Кофейня расположена в локации с крайне высоким трафиком. Вокруг большое количество
                                    бизнес-центров, гостиниц и т.п. Первый, не цокольный этаж. Свой отдельный вход с первой
                                    линии. В качестве наружной рекламы, установлена яркая световая вывеска. Согласована с
                                    комитетом по рекламе.
                                </p>
                                <p>
                                    Кофейня находится в помещении площадью 57 кв.м. Удачная планировка – максимум открытого
                                    пространства, подсобное помещение и уборная. Сделан дизайнерский ремонт. Установлена
                                    качественное новое оборудование, все в собственности. Для посетителей, желающих провести
                                    время в кофейне, сделана комфортная зона на 30 посадочными мест со столиками. В
                                    ассортименте представлен кофе высокого качества с уникальными условиями от поставщика.
                                    Также кондитерские изделия, салаты и сэндвичи.
                                </p>
                                <p>
                                    Владельцы заведения медийные личности и провели мощную рекламную кампанию. Результаты:
                                </p>
                                <ul>
                                    <li>Страница в Инстаграм с более 5000 подписчиков</li>
                                    <li>Посты у популярных блогеров</li>
                                    <li>Высокие рейтинги на тематических ресурсах</li>
                                    <li>Широкая известность среди аудитории 16-25 лет</li>
                                </ul>
                                <p>
                                    В кофейне работает 4 высококвалифицированные бариста.
                                </p>
                                <p>
                                    Если Вы рассматриваете покупку кофейни с локации с высокой проходимостью, то Вам стоит
                                    обратить внимание на данное предложение. Звоните!
                                </p>
                            </div>
                        </div>
                        <div class="column is-4"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
