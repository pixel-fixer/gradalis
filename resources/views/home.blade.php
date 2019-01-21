@extends('layouts.app')

@section('content')

    <!-- Section Top Sliders -->
    <section class="section pb-0">
        <div class="container">
            <!-- ToDo: не выводить на мобильных устройствах -->
            <div class="columns is-hidden-mobile">
                <div class="column is-6">
                    <!-- Swiper -->
                    <div class="swiper-container swiper-home-info swiper-home-info-left">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="slide-wrap">
                                    <a href="" class="slide">
                                        <figure>
                                            <img src="{{ asset('/img/home/sliders/girl.png') }}" alt="Fav">
                                        </figure>
                                        <div class="slide-content">
                                            <div class="slide__tag">Популярные</div>
                                            <div class="slide__cat">Продукты для покупателя</div>
                                            <div class="slide__title">Персональный менеджер</div>
                                            <div class="slide__content">
                                                Ваш персональный менеджер, который говорит сразу
                                                на 3 языках, для вашего комфорта.
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slide-wrap">
                                    <a href="" class="slide">
                                        <figure>
                                            <img src="{{ asset('/img/home/sliders/girl.png') }}" alt="Fav">
                                        </figure>
                                        <div class="slide-content">
                                            <div class="slide__tag">Популярные</div>
                                            <div class="slide__cat">Продукты для покупателя</div>
                                            <div class="slide__title">Персональный менеджер 2</div>
                                            <div class="slide__content">
                                                Ваш персональный менеджер, который говорит сразу
                                                на 3 языках, для вашего комфорта.
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination swiper-pagination-white"></div>
                    </div>
                </div>
                <div class="column is-6">
                    <!-- Swiper -->
                    <div class="swiper-container swiper-home-info swiper-home-info-right">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="slide-wrap">
                                    <a  href="#" class="slide">
                                        <figure>
                                            <img src="{{ asset('/img/home/sliders/girl.png') }}" alt="Fav">
                                        </figure>
                                        <div class="slide-content">
                                            <div class="slide__tag">Популярные</div>
                                            <div class="slide__cat">Продукты для покупателя</div>
                                            <div class="slide__title">Персональный менеджер</div>
                                            <div class="slide__content">
                                                Ваш персональный менеджер, который говорит сразу
                                                на 3 языках, для вашего комфорта.
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slide-wrap">
                                    <a href="#" class="slide">
                                        <figure>
                                            <img src="{{ asset('/img/home/sliders/man.png') }}" alt="Fav">
                                        </figure>
                                        <div class="slide-content">
                                            <div class="slide__tag">Популярные</div>
                                            <div class="slide__cat">Информация для покупателя</div>
                                            <div class="slide__title">Персональный менеджер</div>
                                            <div class="slide__content">
                                                Ваш персональный менеджер, который говорит сразу
                                                на 3 языках, для вашего комфорта.
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="slide-wrap">
                                    <a href="#" class="slide">
                                        <figure>
                                            <img src="{{ asset('/img/home/sliders/man.png') }}" alt="Fav">
                                        </figure>
                                        <div class="slide-content">
                                            <div class="slide__tag">Популярные</div>
                                            <div class="slide__cat">Продукты для покупателя 3</div>
                                            <div class="slide__title">Персональный менеджер</div>
                                            <div class="slide__content">
                                                Ваш персональный менеджер, который говорит сразу
                                                на 3 языках, для вашего комфорта.
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination swiper-pagination-white"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section business -->
    <section class="section section-list-objects pt-1">
        <div class="container">
            <h1 class="section-title">Продажа бизнеса в Польше</h1>
        </div>
        <div class="container">
            <example-form-short></example-form-short>
        </div>
        <div class="container">
            <!-- Cards objects -->
            <div class="columns is-multiline">
                @include('parts.cards-object')
            </div>
            <!-- Link to all objects -->
            <div class="columns is-centered">
                <div class="column is-4 has-text-centered">
                    <a class="button is-link button_bas-big has-text-weight-bold my-1">Посмотреть полный каталог
                        (254)</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section franchise -->
    <section class="section section-list-objects pt-0">
        <div class="container">
            <h1 class="section-title">Продажа франшиз в Польше</h1>
        </div>
        <div class="container">
            <example-form-short></example-form-short>
        </div>
        <div class="container">
            <!-- Cards objects -->
            <div class="columns is-multiline">
                <div class="column is-4">
                    <div class="card card-object">
                        <div class="card-image">
                            <figure class="image is-16by9">
                                <img src="http://sadovnick.ru/upload/iblock/985/985dec2d14c8f7cdf99f99f2da44fcf6.jpg"
                                     alt="Placeholder image">
                            </figure>
                            <span class="tag tag-payback">
                            <span class="name">окупаемость</span>
                            <span class="term">38 месяцев</span>
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
                                <a class="button is-info is-outlined is-fullwidth has-text-weight-bold">Подробнее о
                                    франшизе</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card card-object card-object_promo">
                        <div class="card-image">
                            <figure class="image is-16by9">
                                <img src="http://sadovnick.ru/upload/iblock/985/985dec2d14c8f7cdf99f99f2da44fcf6.jpg"
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
                                <a class="button is-success is-outlined is-fullwidth has-text-weight-bold">Подробнее о
                                    франшизе</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card card-object">
                        <div class="card-image">
                            <figure class="image is-16by9">
                                <img src="http://sadovnick.ru/upload/iblock/985/985dec2d14c8f7cdf99f99f2da44fcf6.jpg"
                                     alt="Placeholder image">
                            </figure>
                            <span class="tag tag-payback">
                            <span class="name">окупаемость</span>
                            <span class="term">38 месяцев</span>
                        </span>
                            <span class="info-icon object-sale">
                            <img src="{{ asset('/svg/icons/ic_sale.svg') }}" alt="Sale">
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
                                    <span class="tag is-danger price-sale">-15%</span>
                                    <div class="price">$2 500 000</div>
                                    <span class="price-old">$2 000 000</span>
                                </div>
                                <a class="button is-info is-outlined is-fullwidth has-text-weight-bold">Подробнее о
                                    франшизе</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card card-object">
                        <div class="card-image">
                            <figure class="image is-16by9">
                                <img src="http://sadovnick.ru/upload/iblock/985/985dec2d14c8f7cdf99f99f2da44fcf6.jpg"
                                     alt="Placeholder image">
                            </figure>
                            <span class="tag tag-payback">
                            <span class="name">окупаемость</span>
                            <span class="term">38 месяцев</span>
                        </span>

                            <span class="tag is-warning tag-object-sold">Продано</span>

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
                                <a class="button is-warning is-outlined is-fullwidth has-text-weight-bold">Подробнее о
                                    сделке</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- -->
                <div class="column is-4">
                    <div class="card card-object">
                        <div class="card-image">
                            <figure class="image is-16by9">
                                <img src="http://sadovnick.ru/upload/iblock/985/985dec2d14c8f7cdf99f99f2da44fcf6.jpg"
                                     alt="Placeholder image">
                            </figure>
                            <span class="tag tag-payback">
                            <span class="name">окупаемость</span>
                            <span class="term">38 месяцев</span>
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
                                <a class="button is-info is-outlined is-fullwidth has-text-weight-bold">Подробнее о
                                    франшизе</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card card-object">
                        <div class="card-image">
                            <figure class="image is-16by9">
                                <img src="http://sadovnick.ru/upload/iblock/985/985dec2d14c8f7cdf99f99f2da44fcf6.jpg"
                                     alt="Placeholder image">
                            </figure>
                            <span class="tag tag-payback">
                            <span class="name">окупаемость</span>
                            <span class="term">38 месяцев</span>
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
                                <a class="button is-info is-outlined is-fullwidth has-text-weight-bold">Подробнее о
                                    франшизе</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Link to all objects -->
            <div class="columns is-centered">
                <div class="column is-4 has-text-centered">
                    <a class="button is-info button_bas-big has-text-weight-bold my-1">Посмотреть полный каталог
                        (254)</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section news -->
    <section class="section section-news has-background-white">
        <div class="container">
            <h1 class="title is-1 section-title">Последняя информация</h1>
        </div>
        <div class="container">
            <div class="swiper-news-home-wrap">
                <!-- Swiper -->
                <div class="swiper-container swiper-news-home">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <article class="card-news">
                                <figure class="card-news__thumb">
                                    <img
                                        src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                        alt="">
                                </figure>
                                <div class="card-news__tags">
                                    <a href="#" class="news-tag-cat">Новости</a>
                                </div>
                                <h3 class="card-news__title title">Председатель Федеральной резервной системы поддержал
                                    рубль</h3>
                                <div class="card-news__excerpt">
                                    Курс доллара в четверг падал ниже 66 рублей, евро подбирался к 75 рублям
                                </div>
                            </article>
                        </div>
                        <div class="swiper-slide">
                            <article class="card-news">
                                <figure class="card-news__thumb">
                                    <img
                                        src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                        alt="">
                                </figure>
                                <div class="card-news__tags">
                                    <a href="#" class="news-tag-cat">Новости</a>
                                </div>
                                <h3 class="card-news__title title">Председатель Федеральной резервной системы поддержал
                                    рубль</h3>
                                <div class="card-news__excerpt">
                                    Курс доллара в четверг падал ниже 66 рублей, евро подбирался к 75 рублям
                                </div>
                            </article>
                        </div>
                        <div class="swiper-slide">
                            <article class="card-news">
                                <figure class="card-news__thumb">
                                    <img
                                        src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                        alt="">
                                </figure>
                                <div class="card-news__tags">
                                    <a href="#" class="news-tag-cat">Новости</a>
                                </div>
                                <h3 class="card-news__title title">Председатель Федеральной резервной системы поддержал
                                    рубль</h3>
                                <div class="card-news__excerpt">
                                    Курс доллара в четверг падал ниже 66 рублей, евро подбирался к 75 рублям
                                </div>
                            </article>
                        </div>
                        <div class="swiper-slide">
                            <article class="card-news">
                                <figure class="card-news__thumb">
                                    <img
                                        src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                        alt="">
                                </figure>
                                <div class="card-news__tags">
                                    <a href="#" class="news-tag-cat">Новости</a>
                                </div>
                                <h3 class="card-news__title title">Председатель Федеральной резервной системы поддержал
                                    рубль</h3>
                                <div class="card-news__excerpt">
                                    Курс доллара в четверг падал ниже 66 рублей, евро подбирался к 75 рублям
                                </div>
                            </article>
                        </div>
                        <div class="swiper-slide">
                            <article class="card-news">
                                <figure class="card-news__thumb">
                                    <img
                                        src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                        alt="">
                                </figure>
                                <div class="card-news__tags">
                                    <a href="#" class="news-tag-cat">Новости</a>
                                </div>
                                <h3 class="card-news__title title">Председатель Федеральной резервной системы поддержал
                                    рубль</h3>
                                <div class="card-news__excerpt">
                                    Курс доллара в четверг падал ниже 66 рублей, евро подбирался к 75 рублям
                                </div>
                            </article>
                        </div>
                        <div class="swiper-slide">
                            <article class="card-news">
                                <figure class="card-news__thumb">
                                    <img
                                        src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                        alt="">
                                </figure>
                                <div class="card-news__tags">
                                    <a href="#" class="news-tag-cat">Новости</a>
                                </div>
                                <h3 class="card-news__title title">Председатель Федеральной резервной системы поддержал
                                    рубль</h3>
                                <div class="card-news__excerpt">
                                    Курс доллара в четверг падал ниже 66 рублей, евро подбирался к 75 рублям
                                </div>
                            </article>
                        </div>
                        <div class="swiper-slide">
                            <article class="card-news">
                                <figure class="card-news__thumb">
                                    <img
                                        src="https://avatars.mds.yandex.net/get-pdb/25978/51b72f68-915e-4759-b9c6-b9d4246eb992/s1200"
                                        alt="">
                                </figure>
                                <div class="card-news__tags">
                                    <a href="#" class="news-tag-cat">Новости</a>
                                </div>
                                <h3 class="card-news__title title">Председатель Федеральной резервной системы поддержал
                                    рубль</h3>
                                <div class="card-news__excerpt">
                                    Курс доллара в четверг падал ниже 66 рублей, евро подбирался к 75 рублям
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

        </div>
    </section>
@endsection
