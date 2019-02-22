@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <!-- Section business -->
    <section class="section section-list-objects pt-1">
        <div class="container">
            <div class="columns is-multiline">
                <div class="column is-12-tablet is-8-desktop">
                    <main class="news-single box">
                        <div class="news-single__header">
                            <h1 class="section-title">FCG: четыре радикальных тренда на рынке одежды в 2019 году</h1>
                            <div class="news-single__header__info is-flex">
                                <div class="news-single__header__tag-cat-list">
                                    <a href="#" class="news-tag-cat">Новости</a>
                                </div>
                                <time class="is-size-875">20 декабря 2018</time>
                            </div>
                        </div>
                        <div class="news-single__thumb">
                            <img src="http://laudator.ru/wp-content/uploads/2013/08/magazin-odezhdyi.jpg" alt="">
                            {{--<video class="w-full" controls="">--}}
                                {{--<source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">--}}
                                {{--Your browser does not support HTML5 video.--}}
                            {{--</video>--}}
                        </div>
                        <div class="content">
                            <p style="font-style: italic; font-size: 18px; color: #596C80;">
                                The Business of Fashion (BoF) и McKinsey & Company обнародовали список главных трендов
                                фэшн-бизнеса будущего года. В исследовании The State of Fashion 2019 перечисляются 10
                                основных тенденций. Перевод обзора публикует Inc.
                            </p>
                            <p>
                                Эксперты ожидают, что в 2019 году рост отрасли замедлится: прогнозируется, что McKinsey
                                Global Fashion Index, который отслеживает продажи в отрасли, операционную прибыль и
                                создание дополнительной стоимости, в следующем году составит 3,5–4,5 проц против 4–5
                                проц в 2018 году. Ухудшение прогноза на 2019 год связано с экономическими и
                                политическими вызовами в России, Африке, Латинской Америке, а также на Ближнем Востоке,
                                которые могут снизить потребительские расходы. В отчете также говорится, что в 2019 году
                                Китай впервые обойдет США и станет крупнейшим модным рынком в мире.
                            </p>
                            <h2>10 основных трендов фэшн-бизнеса</h2>
                            <p>
                                «Участники модного рынка начали заблаговременно смотреть на возможности, а не просто
                                фокусироваться на предстоящих вызовах», — говорится в исследовании. Авторы ожидают, что
                                основной импульс роста будет поступать с рынков люксовых товаров, а также от
                                развивающихся рынков в Азии.
                            </p>
                            <h3>Осторожность</h3>
                            <p>
                                В отрасли возникнут опасливые настроения из-за ослабления ключевых экономических
                                показателей и других потенциально дестабилизирующих сил, ожидают в BoF и McKinsey.
                                Представители модной индустрии начнут действовать осторожнее из-за опасений возможного
                                замедления мировой экономики к 2020 году и будут активнее изучать свои возможности для
                                повышения производительности.
                            </p>
                            <h3>Торговля 2.0</h3>
                            <p>Компаниям нужно подготовить планы экстренных мероприятий на случай возможной
                                реорганизации мировых производственно-бытовых связей.</p>
                            <ul>
                                <li>Бизнес-план</li>
                                <li>Интеграция</li>
                                <li>Вторичная бухгалтерия</li>
                            </ul>
                            <p>Кроме того, сферу торговли одеждой могут изменить новые барьеры, напряженность в вопросах
                                торговли и неопределенность, а новые возможности могут появиться на фоне усиления
                                торговли между развивающимися странами и пересмотра торговых соглашений.</p>
                            <blockquote style="font-size: 24px;">
                                Количество упоминаний слова feminist в рассылках или на сайтах ретейлеров увеличится в
                                6,3 раза по сравнению с 2016 годом.
                            </blockquote>
                            <p>Кроме того, сферу торговли одеждой могут изменить новые барьеры, напряженность в вопросах
                                торговли и неопределенность, а новые возможности могут появиться на фоне усиления
                                торговли между развивающимися странами и пересмотра торговых соглашений.</p>
                        </div>
                        <div class="tags">
                            <span class="tag tag_big">fashion</span>
                            <span class="tag tag_big">тенденции</span>
                            <span class="tag tag_big">аналитика</span>
                        </div>
                        <hr class="my-1">
                        <div class="share-list">
                            <a href="#" class="share-item is-fb button">Поделиться в Facebook</a>
                            <a href="#" class="share-item is-ok button">Поделиться в Одноклассниках</a>
                        </div>
                    </main>
                </div>
                <div class="column is-12-tablet is-4-desktop">
                    <aside class="news-single-aside">
                        <div class="columns is-multiline">
                            <div class="column is-8-tablet is-12-desktop">
                                <section>
                                    <h2>Популярные статьи</h2>
                                    <div class="columns is-multiline">
                                        <div class="column is-6-tablet is-12-desktop">
                                            <article class="card-news">
                                                <figure class="card-news__thumb">
                                                    <img
                                                        src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                                        alt="">
                                                </figure>
                                                <div class="card-news__tags">
                                                    <a href="#" class="news-tag-cat">Новости</a>
                                                </div>
                                                <h3 class="card-news__title title">Председатель Федеральной резервной
                                                    системы
                                                    поддержал
                                                    рубль</h3>
                                                <div class="card-news__excerpt">
                                                    Курс доллара в четверг падал ниже 66 рублей, евро подбирался к 75
                                                    рублям
                                                </div>
                                            </article>
                                        </div>
                                        <div class="column is-6-tablet is-12-desktop">
                                            <article class="card-news">
                                                <figure class="card-news__thumb">
                                                    <img
                                                        src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                                        alt="">
                                                </figure>
                                                <div class="card-news__tags">
                                                    <a href="#" class="news-tag-cat">Новости</a>
                                                </div>
                                                <h3 class="card-news__title title">Председатель Федеральной резервной
                                                    системы
                                                    поддержал
                                                    рубль</h3>
                                                <div class="card-news__excerpt">
                                                    Курс доллара в четверг падал ниже 66 рублей, евро подбирался к 75
                                                    рублям
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="column is-4-tablet is-12-desktop">
                                <section>
                                    <h2>Рекомендуем</h2>
                                    <div class="card card-object card-object_promo">
                                        <div class="card-image">
                                            <figure class="image is-16by9">
                                                <img
                                                    src="http://laudator.ru/wp-content/uploads/2013/08/magazin-odezhdyi.jpg"
                                                    alt="Placeholder image">
                                            </figure>
                                            <span class="tag tag-payback">
                            <span class="name">окупаемость</span>
                            <span class="term">38 месяцев</span>
                        </span>
                                            <span class="info-icon object-promo">
                            <img src="{{ asset('/svg/icons/ic_recommended.svg') }}" alt="Recommended">
                        </span>
                                            <a href="#" class="info-icon object-favorite"
                                               v-tooltip="'Добавить в избранное'">
                                                <img src="{{ asset('/svg/icons/ic_favorites_white.svg') }}" alt="Fav">
                                            </a>

                                        </div>
                                        <div class="card-content">
                                            <div class="card-object__header">
                                                <h3 class="title">Мини-отель в собственность с видом на Невский
                                                    проспект</h3>
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
                                </section>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
