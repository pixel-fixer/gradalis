@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <div class="object">
        <!-- Section object header -->
        <section class="section pt-1 pb-0">
            <div class="container">
                <div class="object__header">
                    <h1 class="section-title">{{$business->name}}</h1>
                    <div class="object__header__info">
                        <ul>
                            <li>ID Объекта: {{$business->id}}</li>
                            <li>{{$business->created_at->format('d F Y')}}</li>
                            <li>{{$business->show_count}} просмотров</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section object content -->
        <section class="section is-paddingless">
            <div class="container">
                <div class="object__body object__body_promo box is-paddingless">
                    <div class="object__body__top">
                        <div class="object__slider">
                            <!-- Swiper -->
                            <div class="swiper-container gallery-top swiper-object-main">
                                <div class="swiper-wrapper">
                                    {{--@foreach($business->getMedia('business/'.auth()->user()->id) as $image)--}}
                                        {{--<div class="swiper-slide"--}}
                                             {{--style="background-image:url({{$image->getUrl()}})"></div>--}}
                                    {{--@endforeach--}}
                                    <div class="swiper-slide"
                                         style="background-image:url(https://photo.hotellook.com/image_v2/crop/2272683466/1200/630.auto)"></div>
                                    <div class="swiper-slide"
                                         style="background-image:url(http://sochi.go2all.ru/imgs/6/0/117657.jpg)"></div>
                                    <div class="swiper-slide"
                                         style="background-image:url(https://attaches.1001tur.ru/hotels/gallery/451235/29911534658481.jpg)"></div>
                                    <div class="swiper-slide"
                                         style="background-image:url(https://gogolhotel.ru/images/r2.jpg)"></div>
                                    <div class="swiper-slide"
                                         style="background-image:url(https://hotel-spasskaya.ru/sites/default/files/rooms/dis1.jpg)"></div>
                                    <div class="swiper-slide"
                                         style="background-image:url(https://t-ec.bstatic.com/images/hotel/max1024x768/165/16559105.jpg)"></div>
                                    <div class="swiper-slide"
                                         style="background-image:url(https://s-ec.bstatic.com/images/hotel/max1024x768/245/24568680.jpg)"></div>
                                    <div class="swiper-slide"
                                         style="background-image:url(https://lookinhotels.ru/data/public/2813/35585/hotel-rooms.jpg)"></div>
                                    <div class="swiper-slide"
                                         style="background-image:url(http://tourismtur.ru/wp-content/uploads/%D0%9E%D1%82%D0%B5%D0%BB%D1%8C%20Viva%20la%20Hotel/1.jpg)"></div>
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <div class="swiper-container gallery-thumbs swiper-object-thumbs">
                                <div class="swiper-wrapper">
                                    {{--@foreach($business->getMedia('business/'.auth()->user()->id) as $image)--}}
                                        {{--<div class="swiper-slide"--}}
                                             {{--style="background-image:url({{$image->getUrl()}})"></div>--}}
                                    {{--@endforeach--}}
                                    <div class="swiper-slide"
                                         style="background-image:url(https://photo.hotellook.com/image_v2/crop/2272683466/1200/630.auto)"></div>
                                    <div class="swiper-slide"
                                         style="background-image:url(http://sochi.go2all.ru/imgs/6/0/117657.jpg)"></div>
                                    <div class="swiper-slide"
                                         style="background-image:url(https://attaches.1001tur.ru/hotels/gallery/451235/29911534658481.jpg)"></div>
                                    <div class="swiper-slide"
                                         style="background-image:url(https://gogolhotel.ru/images/r2.jpg)"></div>
                                    <div class="swiper-slide"
                                         style="background-image:url(https://hotel-spasskaya.ru/sites/default/files/rooms/dis1.jpg)"></div>
                                    <div class="swiper-slide"
                                         style="background-image:url(https://t-ec.bstatic.com/images/hotel/max1024x768/165/16559105.jpg)"></div>
                                    <div class="swiper-slide"
                                         style="background-image:url(https://s-ec.bstatic.com/images/hotel/max1024x768/245/24568680.jpg)"></div>
                                    <div class="swiper-slide"
                                         style="background-image:url(https://lookinhotels.ru/data/public/2813/35585/hotel-rooms.jpg)"></div>
                                    <div class="swiper-slide"
                                         style="background-image:url(http://tourismtur.ru/wp-content/uploads/%D0%9E%D1%82%D0%B5%D0%BB%D1%8C%20Viva%20la%20Hotel/1.jpg)"></div>
                                </div>
                            </div>
                        </div>
                        <div class="object__broker">
                            <div class="object__broker__top is-flex">
                                <div class="object__broker__top__left">
                                    <figure class="object__broker__avatar">
                                        <img
                                            src="https://image.freepik.com/free-photo/no-translate-detected_23-2147650966.jpg"
                                            alt="">
                                    </figure>
                                </div>
                                <div class="object__broker__top__right">
                                    {{--<div class="price-info">--}}
                                    {{--<div class="price">$18 000 560</div>--}}
                                    {{--</div>--}}

                                    <div class="price-info">
                                        @if($business->discount > 0)
                                            <span class="tag is-danger price-sale">-{{$business->discount}}%</span>
                                            <div
                                                class="price">{{number_format($business->price - $business->price*($business->discount/100), 0,' ',' ')}}
                                                zt
                                            </div>
                                            <span
                                                class="price-old">{{number_format($business->price, 0,' ',' ') }} zt
                                            </span>
                                        @else
                                            <div
                                                class="price">{{number_format($business->price, 0,' ',' ')}} zt
                                            </div>
                                        @endif
                                    </div>

                                    <div class="object__broker__info is-size-875">
                                        Брокер объекта: Дмитрий
                                    </div>
                                </div>
                            </div>
                            <div class="object__broker__bottom is-flex">
                                {{-- TODO временная заглушка --}}
                                <a href="/profile/chat" class="button is-success is-size-875 has-text-weight-bold modal-button">
                                    <img src="{{ asset('/svg/icons/ic_ask_question.svg') }}" alt="">
                                    <span>Задать вопрос по объекту</span>
                                </a>
                                {{-- <button class="button is-success is-size-875 has-text-weight-bold modal-button"
                                        @click="showModal('modal-question-object')">
                                    <img src="{{ asset('/svg/icons/ic_ask_question.svg') }}" alt="">
                                    <span>Задать вопрос по объекту</span>
                                </button> --}}
                            </div>
                        </div>

                        <span class="info-icon object-promo">
                            <img src="{{ asset('/svg/icons/ic_recommended.svg') }}" alt="Recommended">
                        </span>
                        @if($business->favorites->isEmpty())
                            <a href="#"  @click="toggleFavorite( {{$business->id}}, 'business')"  class="info-icon object-favorite" v-tooltip="'Добавить в избранное'">
                                <img src="{{ asset('/svg/icons/ic_favorites_white.svg') }}" alt="Fav">
                            </a>
                        @else
                            <a href="#"  @click="toggleFavorite( {{$business->id}}, 'business')"  class="info-icon object-favorite active" v-tooltip="'Удалить из избранного'">
                                <img src="{{ asset('/svg/icons/ic_favorites_white.svg') }}" alt="Fav">
                            </a>
                        @endif

                        {{--<span class="tag is-warning tag-object-sold">Продано</span>--}}

                        {{--<span class="info-icon object-sale">--}}
                        {{--<img src="{{ asset('/svg/icons/ic_sale.svg') }}" alt="Sale">--}}
                        {{--</span>--}}
                    </div>

                    <div class="slider-services">
                        <!-- Swiper -->
                        <div class="swiper-container swiper-object-services">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <!-- ToDo: У кнопки "заказать" классы отличаются от тех, которые есть у карточки на странице списка услуг -->
                                    <!-- Example Layout card service -->
                                    <div class="card card-service">
                                        <div class="card-service__body">
                                            <div class="is-flex">
                                                <figure class="card-service__icon">
                                                    <img src="{{ asset('/svg/icons/services/ic_translate.svg') }}"
                                                         alt="">
                                                </figure>
                                                <h4 class="card-service__title">Перевод документов</h4>
                                            </div>
                                            <div class="card-service__info">
                                                <div class="card-service__excerpt is-size-875">
                                                    Наши специалисты переведут документы на английский и русский.
                                                </div>
                                                <div class="card-service__price">€15 за один перевод</div>
                                            </div>
                                        </div>
                                        <div class="card-service__footer">
                                            <a class="button is-link is-size-875 h-3">Заказать</a>
                                            <a class="button is-clear is-clear_close is-size-875 h-3"><span
                                                    class="has-text-decoration-underline">Подробнее</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <!-- Example Layout card service -->
                                    <div class="card card-service">
                                        <div class="card-service__body">
                                            <div class="is-flex">
                                                <figure class="card-service__icon">
                                                    <img src="{{ asset('/svg/icons/services/ic_translate.svg') }}"
                                                         alt="">
                                                </figure>
                                                <h4 class="card-service__title">Перевод документов</h4>
                                            </div>
                                            <div class="card-service__info">
                                                <div class="card-service__excerpt is-size-875">
                                                    Наши специалисты переведут документы на английский и русский.
                                                </div>
                                                <div class="card-service__price">€15 за один перевод</div>
                                            </div>
                                        </div>
                                        <div class="card-service__footer">
                                            <a class="button is-link is-size-875 h-3">Заказать</a>
                                            <a class="button is-clear is-clear_close is-size-875 h-3"><span
                                                    class="has-text-decoration-underline">Подробнее</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <!-- Example Layout card service -->
                                    <div class="card card-service">
                                        <div class="card-service__body">
                                            <div class="is-flex">
                                                <figure class="card-service__icon">
                                                    <img src="{{ asset('/svg/icons/services/ic_translate.svg') }}"
                                                         alt="">
                                                </figure>
                                                <h4 class="card-service__title">Перевод документов</h4>
                                            </div>
                                            <div class="card-service__info">
                                                <div class="card-service__excerpt is-size-875">
                                                    Наши специалисты переведут документы на английский и русский.
                                                </div>
                                                <div class="card-service__price">€15 за один перевод</div>
                                            </div>
                                        </div>
                                        <div class="card-service__footer">
                                            <a class="button is-link is-size-875 h-3">Заказать</a>
                                            <a class="button is-clear is-clear_close is-size-875 h-3"><span
                                                    class="has-text-decoration-underline">Подробнее</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <!-- Example Layout card service -->
                                    <div class="card card-service">
                                        <div class="card-service__body">
                                            <div class="is-flex">
                                                <figure class="card-service__icon">
                                                    <img src="{{ asset('/svg/icons/services/ic_translate.svg') }}"
                                                         alt="">
                                                </figure>
                                                <h4 class="card-service__title">Перевод документов</h4>
                                            </div>
                                            <div class="card-service__info">
                                                <div class="card-service__excerpt is-size-875">
                                                    Наши специалисты переведут документы на английский и русский.
                                                </div>
                                                <div class="card-service__price">€15 за один перевод</div>
                                            </div>
                                        </div>
                                        <div class="card-service__footer">
                                            <a class="button is-link is-size-875 h-3">Заказать</a>
                                            <a class="button is-clear is-clear_close is-size-875 h-3"><span
                                                    class="has-text-decoration-underline">Подробнее</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <!-- Example Layout card service -->
                                    <div class="card card-service">
                                        <div class="card-service__body">
                                            <div class="is-flex">
                                                <figure class="card-service__icon">
                                                    <img src="{{ asset('/svg/icons/services/ic_translate.svg') }}"
                                                         alt="">
                                                </figure>
                                                <h4 class="card-service__title">Перевод документов</h4>
                                            </div>
                                            <div class="card-service__info">
                                                <div class="card-service__excerpt is-size-875">
                                                    Наши специалисты переведут документы на английский и русский.
                                                </div>
                                                <div class="card-service__price">€15 за один перевод</div>
                                            </div>
                                        </div>
                                        <div class="card-service__footer">
                                            <a class="button is-link is-size-875 h-3">Заказать</a>
                                            <a class="button is-clear is-clear_close is-size-875 h-3"><span
                                                    class="has-text-decoration-underline">Подробнее</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <!-- Example Layout card service -->
                                    <div class="card card-service">
                                        <div class="card-service__body">
                                            <div class="is-flex">
                                                <figure class="card-service__icon">
                                                    <img src="{{ asset('/svg/icons/services/ic_translate.svg') }}"
                                                         alt="">
                                                </figure>
                                                <h4 class="card-service__title">Перевод документов</h4>
                                            </div>
                                            <div class="card-service__info">
                                                <div class="card-service__excerpt is-size-875">
                                                    Наши специалисты переведут документы на английский и русский.
                                                </div>
                                                <div class="card-service__price">€15 за один перевод</div>
                                            </div>
                                        </div>
                                        <div class="card-service__footer">
                                            <a class="button is-link is-size-875 h-3">Заказать</a>
                                            <a class="button is-clear is-clear_close is-size-875 h-3"><span
                                                    class="has-text-decoration-underline">Подробнее</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <!-- Example Layout card service -->
                                    <div class="card card-service">
                                        <div class="card-service__body">
                                            <div class="is-flex">
                                                <figure class="card-service__icon">
                                                    <img src="{{ asset('/svg/icons/services/ic_translate.svg') }}"
                                                         alt="">
                                                </figure>
                                                <h4 class="card-service__title">Перевод документов</h4>
                                            </div>
                                            <div class="card-service__info">
                                                <div class="card-service__excerpt is-size-875">
                                                    Наши специалисты переведут документы на английский и русский.
                                                </div>
                                                <div class="card-service__price">€15 за один перевод</div>
                                            </div>
                                        </div>
                                        <div class="card-service__footer">
                                            <a class="button is-link is-size-875 h-3">Заказать</a>
                                            <a class="button is-clear is-clear_close is-size-875 h-3"><span
                                                    class="has-text-decoration-underline">Подробнее</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <!-- Example Layout card service -->
                                    <div class="card card-service">
                                        <div class="card-service__body">
                                            <div class="is-flex">
                                                <figure class="card-service__icon">
                                                    <img src="{{ asset('/svg/icons/services/ic_translate.svg') }}"
                                                         alt="">
                                                </figure>
                                                <h4 class="card-service__title">Перевод документов</h4>
                                            </div>
                                            <div class="card-service__info">
                                                <div class="card-service__excerpt is-size-875">
                                                    Наши специалисты переведут документы на английский и русский.
                                                </div>
                                                <div class="card-service__price">€15 за один перевод</div>
                                            </div>
                                        </div>
                                        <div class="card-service__footer">
                                            <a class="button is-link is-size-875 h-3">Заказать</a>
                                            <a class="button is-clear is-clear_close is-size-875 h-3"><span
                                                    class="has-text-decoration-underline">Подробнее</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next swiper-object-services-next"></div>
                        <div class="swiper-button-prev swiper-object-services-prev"></div>
                    </div>

                    <div class="p-1-5">
                        <div class="columns">
                            <div class="column is-8">
                                <div class="content">
                                    <h2>Описание объекта</h2>
                                    <div class="object__description">
                                        {{$business->description}}
                                    </div>

                                    <div class="object__info-wrap">
                                        <button
                                            class="button is-info is-outlined is-size-875 has-text-weight-bold object__info__toggle"
                                            @click="object.showDetailedInformation = !object.showDetailedInformation"
                                            v-show="!object.showDetailedInformation"
                                        >
                                            Посмотреть подробную информацию
                                        </button>

                                        <div class="object__info" v-show="object.showDetailedInformation">
                                            <div>
                                                <div class="object__info__group">
                                                    <h3 class="object__info__title">
                                                        <img src="{{ asset('/svg/icons/ic_info.svg') }}" alt="Info"
                                                             class="icon">
                                                        <span>Основная информация</span>
                                                    </h3>
                                                    <div class="object__info__list">
                                                        <div class="object__info__list__item">
                                                            <span>Причина продажи</span>
                                                            <span>Переход в другую сферу интересов</span>
                                                        </div>
                                                        <div class="object__info__list__item">
                                                            <span>Название фирмы</span>
                                                            <span>Invest.pl</span>
                                                        </div>
                                                        <div class="object__info__list__item">
                                                            <span>Профиль деятельности</span>
                                                            <span>Венчурные инвестиции</span>
                                                        </div>
                                                        <div class="object__info__list__item">
                                                            <span>Адрес</span>
                                                            <span>ul. Dluga 52, Warsaw 00-241, Poland </span>
                                                        </div>
                                                        <div class="object__info__list__item">
                                                            <span>Индекс</span>
                                                            <span>022245</span>
                                                        </div>
                                                        <div class="object__info__list__item">
                                                            <span>Количество сотрудников</span>
                                                            <span>3</span>
                                                            <div class="object__info__list__item__subgroup">
                                                                <div class="object__info__list__item">
                                                                    <span>Менеджер по продажам</span>
                                                                    <span>€ 1 300</span>
                                                                </div>
                                                                <div class="object__info__list__item">
                                                                    <span>Директор по персоналу</span>
                                                                    <span>€ 2 300</span>
                                                                </div>
                                                                <div class="object__info__list__item">
                                                                    <span>Руководитель направления</span>
                                                                    <span>€ 3 300</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="object__info__group">
                                                    <h3 class="object__info__title">
                                                        <img src="{{ asset('/svg/icons/ic_target_audience.svg') }}"
                                                             alt="Target audience"
                                                             class="icon">
                                                        <span>Целевая аудитория</span>
                                                    </h3>
                                                    <div class="object__info__list">
                                                        <div class="object__info__list__item">
                                                            <span>Целевая аудитория</span>
                                                            <span>Мужчины и женщины с высоким доходом</span>
                                                        </div>
                                                        <div class="object__info__list__item">
                                                            <span>Средний возраст клиентов</span>
                                                            <span>28-48</span>
                                                        </div>
                                                        <div class="object__info__list__item">
                                                            <span>Средний чек</span>
                                                            <span>€ 10 000</span>
                                                        </div>
                                                        <div class="object__info__list__item">
                                                            <span>Стоимость привлечения</span>
                                                            <span>€ 1 000</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="object__info__group">
                                                    <h3 class="object__info__title">
                                                        <img src="{{ asset('/svg/icons/ic_object_finance.svg') }}"
                                                             alt="Finance"
                                                             class="icon">
                                                        <span>Финансовые показатели</span>
                                                    </h3>
                                                    <div class="object__info__list">
                                                        <div class="object__info__list__item">
                                                            <span>Обороты в месяц</span>
                                                            <span>€ 20 000</span>
                                                        </div>
                                                        <div class="object__info__list__item">
                                                            <span>Расходы в месяц</span>
                                                            <span>€ 10 000</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="object__info__group">
                                                    <h3 class="object__info__title">
                                                        <img src="{{ asset('/svg/icons/ic_law_form.svg') }}" alt="Law"
                                                             class="icon">
                                                        <span>Юридическое состояние</span>
                                                    </h3>
                                                    <div class="object__info__list">
                                                        <div class="object__info__list__item">
                                                            <span>Title</span>
                                                            <span>Value</span>
                                                        </div>
                                                        <div class="object__info__list__item">
                                                            <span>Title</span>
                                                            <span>Value</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="object__info__group">
                                                    <h3 class="object__info__title">
                                                        <img src="{{ asset('/svg/icons/ic_judge.svg') }}" alt="Judge"
                                                             class="icon">
                                                        <span>Правовое состояние компании</span>
                                                    </h3>
                                                    <div class="object__info__list">
                                                        <div class="object__info__list__item">
                                                            <span>Title</span>
                                                            <span>Value</span>
                                                        </div>
                                                        <div class="object__info__list__item">
                                                            <span>Title</span>
                                                            <span>Value</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="object__info__group">
                                                    <h3 class="object__info__title">
                                                        <img src="{{ asset('/svg/icons/ic_process.svg') }}"
                                                             alt="Process"
                                                             class="icon">
                                                        <span>Бизнес-процессы</span>
                                                    </h3>
                                                    <div class="object__info__list">
                                                        <div class="object__info__list__item">
                                                            <span>Title</span>
                                                            <span>Value</span>
                                                        </div>
                                                        <div class="object__info__list__item">
                                                            <span>Title</span>
                                                            <span>Value</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="object__info__group">
                                                    <h3 class="object__info__title">
                                                        <img src="{{ asset('/svg/icons/ic_globe.svg') }}" alt="Globe"
                                                             class="icon">
                                                        <span>Нематериальные активы</span>
                                                    </h3>
                                                    <div class="object__info__list">
                                                        <div class="object__info__list__item">
                                                            <span>Title</span>
                                                            <span>Value</span>
                                                        </div>
                                                        <div class="object__info__list__item">
                                                            <span>Title</span>
                                                            <span>Value</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="object__info__group">
                                                    <h3 class="object__info__title">
                                                        <img src="{{ asset('/svg/icons/ic_money.svg') }}" alt="Money"
                                                             class="icon">
                                                        <span>Материальные активы</span>
                                                    </h3>
                                                    <div class="object__info__list">
                                                        <div class="object__info__list__item">
                                                            <span>Title</span>
                                                            <span>Value</span>
                                                        </div>
                                                        <div class="object__info__list__item">
                                                            <span>Title</span>
                                                            <span>Value</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="object__info__group">
                                                    <h3 class="object__info__title">
                                                        <img src="{{ asset('/svg/icons/ic_object_building.svg') }}"
                                                             alt="Building"
                                                             class="icon">
                                                        <span>Недвижимость</span>
                                                    </h3>
                                                    <div class="object__info__list">
                                                        <div class="object__info__list__item">
                                                            <span>Title</span>
                                                            <span>Value</span>
                                                        </div>
                                                        <div class="object__info__list__item">
                                                            <span>Title</span>
                                                            <span>Value</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button
                                                class="button is-info is-outlined is-size-875 has-text-weight-bold object__info__toggle"
                                                @click="object.showDetailedInformation = !object.showDetailedInformation"
                                            >
                                                Скрыть подробную информацию
                                            </button>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="column is-4">
                                <div class="object__basic-short-info">
                                    <div class="list-properties">
                                        <div class="list-properties__item">
                                            <span>Страна</span>
                                            <span>{{$business->city->country->translation}}</span>
                                        </div>
                                        <div class="list-properties__item">
                                            <span>Город</span>
                                            <span>{{$business->city->translation}}</span>
                                        </div>
                                        <div class="list-properties__item">
                                            <span>Категория</span>
                                            <span>{{$business->category->translation}}</span>
                                        </div>
                                        <hr>
                                        <div class="list-properties__item">
                                            <span>Окупаемость</span>
                                            <span><b>{{$business->payback}} месяцев</b></span>
                                        </div>
                                        <div class="list-properties__item">
                                            <span>Выручка</span>
                                            <span><b>{{number_format($business->revenue, 0,' ',' ')}} zt</b></span>
                                        </div>
                                        <div class="list-properties__item">
                                            <span>Прибыль</span>
                                            <span><b>{{number_format($business->profit, 0,' ',' ')}} zt</b></span>
                                        </div>
                                        <div class="list-properties__item">
                                            <span>Доходность</span>
                                            <span><b>{{$business->profitability}}%</b></span>
                                        </div>
                                        <hr>
                                        <div class="list-properties__item">
                                            <span>Цена в евро</span>
                                            <span><b>{{number_format($business->euro - $business->euro*($business->discount/100), 0,'.',' ')}}</b></span>
                                        </div>
                                        <div class="list-properties__item">
                                            <span>Цена в злотых</span>
                                            <span><b>{{number_format($business->price - $business->price*($business->discount/100), 0,'.',' ')}}</b></span>
                                        </div>
                                        <div class="list-properties__item">
                                            <span>Цена в биткоинах</span>
                                            <span><b>{{number_format($business->bitcoin - $business->bitcoin*($business->discount/100), 4,'.',' ')}}</b></span>
                                        </div>
                                    </div>
                                    <div class="buttons">
                                        <a href="#"
                                           @click="showModal('modal-ask-documents')"
                                           class="button is-success is-fullwidth has-text-weight-bold is-size-875">Получить
                                            документы</a>
                                        <reserve-button :id="{{$business->id}}" :url="'/business-reserve'"></reserve-button>
                                    </div>
                                </div>
                                <div class="has-text-centered object__how-purchase">
                                    <a class="is-size-875 is-info" @click="showModal('modal-how-purchase')">
                                        <img src="{{ asset('/svg/icons/ic_lifesaver.svg') }}"
                                             alt="">
                                        <span>Как происходит покупка?</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section similar offers -->
        <section class="section">
            <div class="container">
                <h2 class="title section-title">Похожие предложения</h2>
                <div class="columns is-multiline">
                    <!-- ToDo: выводить 3 штуки -->
                    @include('parts.cards-object')
                </div>
            </div>
        </section>
    </div>

    <!-- Modal -->
    <div class="modal" id="modal-question-object">
        <div class="modal-background" @click="hideModal('modal-question-object')"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Modal title</p>
                <button class="delete close-modal" @click="hideModal('modal-question-object')"
                        aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <!-- Content ... -->
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success">Save changes</button>
                <button class="button">Cancel</button>
            </footer>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="modal-ask-documents">
        <div class="modal-background" @click="hideModal('modal-ask-documents')"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Ваш запрос принят</p>
                <button class="delete close-modal" @click="hideModal('modal-ask-documents')"
                        aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <p>Спасибо мы отправили запрос</p>
            </section>
            <footer class="modal-card-foot">
                <button @click="hideModal('modal-ask-documents')" class="button is-success">Закрыть</button>
            </footer>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="modal-how-purchase">
        <div class="modal-background" @click="hideModal('modal-how-purchase')"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Как происходит сделка?</p>
                <button class="delete close-modal" @click="hideModal('modal-how-purchase')"
                        aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <div class="content">
                    <p>
                        Оставляйте заявку, это вас не обязывает ни к чему. Вместе с вами мы пройдем следующие шаги:
                    </p>
                    <ol class="ol-big-counter">
                        <li>Вам позвонит эксперт по бизнесу, чтобы уточнить критерии поиска и проконсультировать при
                            необходимости
                        </li>
                        <li>Эксперт найдёт для вас самые подходящие варианты</li>
                        <li>Вместе с вами эксперт едет на объект, чтобы посмотреть его «вживую»</li>
                        <li>Если объект понравился, назначаем встречу с собственником</li>
                        <li>Заключаем предварительный договор — до завершения сделки ваши деньги защищены и не переходят
                            к
                            продавцу бизнеса
                        </li>
                        <li>Вы проверяете бизнес — от недели</li>
                        <li>Заключаем основной договор. К вам переходят все активы, а к продавцу — деньги</li>
                    </ol>
                </div>
            </section>
            <footer class="modal-card-foot">
                <a href="#" class="button is-success is-fullwidth h-3">Оставить заявку</a>
            </footer>
        </div>
    </div>
@endsection
