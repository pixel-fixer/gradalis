@extends('layouts.app')

@section('content')
    <div class="container">
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
                            <p class="location"><img src="{{ asset('/svg/icons/ic_location.svg') }}" alt="Fav"><span>Россия, г. Санкт-Петербург</span>
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
                            <a class="button is-link is-outlined is-fullwidth"><b>Подробнее о бизнесе</b></a>
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
                            <p class="location"><img src="{{ asset('/svg/icons/ic_location.svg') }}" alt="Fav"><span>Россия, г. Санкт-Петербург</span>
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
                            <a class="button is-success is-outlined is-fullwidth"><b>Подробнее о бизнесе</b></a>
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
                            <p class="location"><img src="{{ asset('/svg/icons/ic_location.svg') }}" alt="Fav"><span>Россия, г. Санкт-Петербург</span>
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
                            <a class="button is-link is-outlined is-fullwidth"><b>Подробнее о бизнесе</b></a>
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
                            <p class="location"><img src="{{ asset('/svg/icons/ic_location.svg') }}" alt="Fav"><span>Россия, г. Санкт-Петербург</span>
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
                            <a class="button is-warning is-outlined is-fullwidth"><b>Подробнее о сделке</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
