@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')
    <div class="container">
        <div class="columns">
            <div class="column is-4">
                @include('spa.aside')
            </div>
            <div class="column is-8">
                <section class="section pt-1 px-0">

                    <h1 class="section-title mb-1-75">Избранное</h1>

                    <!-- Cards objects -->
                    <div class="columns is-multiline">
                        <div class="column is-6">
                            <div class="card card-object">
                                <div class="card-image">
                                    <figure class="image is-16by9">
                                        <img
                                            src="https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg"
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
                                        <a class="button is-link is-outlined is-fullwidth has-text-weight-bold">Подробнее
                                            о
                                            бизнесе</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="card card-object">
                                <div class="card-image">
                                    <figure class="image is-16by9">
                                        <img
                                            src="https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg"
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
                                        <a class="button is-link is-outlined is-fullwidth has-text-weight-bold">Подробнее
                                            о
                                            бизнесе</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
@endsection
