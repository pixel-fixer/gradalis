@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <div class="object">
        <!-- Section object header -->
        <section class="section pt-1 pb-0">
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

        <!-- Section object content -->
        <section class="section is-paddingless">
            <div class="container">
                <div class="object__body object__body_promo">
                    <div class="object__body__top">
                        <div class="object__slider">
                            <!-- Swiper -->
                            <div class="swiper-container gallery-top swiper-object-main">
                                <div class="swiper-wrapper">
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
                                        <span class="tag is-danger price-sale">-15%</span>
                                        <div class="price">$2 500 000</div>
                                        <span class="price-old">$2 000 000</span>
                                    </div>

                                    <div class="object__broker__info is-size-875">
                                        Брокер объекта: Дмитрий
                                    </div>
                                </div>
                            </div>
                            <div class="object__broker__bottom is-flex">
                                <button class="button is-success is-size-875 has-text-weight-bold modal-button"
                                        @click="showModal('modal-question-object')">
                                    <img src="{{ asset('/svg/icons/ic_ask_question.svg') }}" alt="">
                                    <span>Задать вопрос по объекту</span>
                                </button>
                            </div>
                        </div>

                        <span class="info-icon object-promo">
                            <img src="{{ asset('/svg/icons/ic_recommended.svg') }}" alt="Recommended">
                        </span>
                        <a href="#" class="info-icon object-favorite" v-tooltip="'Добавить в избранное'">
                            <img src="{{ asset('/svg/icons/ic_favorites_white.svg') }}" alt="Fav">
                        </a>

                        {{--<span class="tag is-warning tag-object-sold">Продано</span>--}}

                        {{--<span class="info-icon object-sale">--}}
                            {{--<img src="{{ asset('/svg/icons/ic_sale.svg') }}" alt="Sale">--}}
                        {{--</span>--}}
                    </div>

                    <div class="slider-services">

                    </div>
                    <div class="p-1-5">
                        <div class="columns">
                            <div class="column is-8">
                                <div class="content">
                                    <h2>Описание объекта</h2>
                                    <div class="object__description">
                                        <p>
                                            Кофейня расположена в локации с крайне высоким трафиком. Вокруг большое
                                            количество
                                            бизнес-центров, гостиниц и т.п. Первый, не цокольный этаж. Свой отдельный
                                            вход с
                                            первой
                                            линии. В качестве наружной рекламы, установлена яркая световая вывеска.
                                            Согласована
                                            с
                                            комитетом по рекламе.
                                        </p>
                                        <p>
                                            Кофейня находится в помещении площадью 57 кв.м. Удачная планировка –
                                            максимум
                                            открытого
                                            пространства, подсобное помещение и уборная. Сделан дизайнерский ремонт.
                                            Установлена
                                            качественное новое оборудование, все в собственности. Для посетителей,
                                            желающих
                                            провести
                                            время в кофейне, сделана комфортная зона на 30 посадочными мест со
                                            столиками. В
                                            ассортименте представлен кофе высокого качества с уникальными условиями от
                                            поставщика.
                                            Также кондитерские изделия, салаты и сэндвичи.
                                        </p>
                                        <p>
                                            Владельцы заведения медийные личности и провели мощную рекламную кампанию.
                                            Результаты:
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
                                            Если Вы рассматриваете покупку кофейни с локации с высокой проходимостью, то
                                            Вам
                                            стоит
                                            обратить внимание на данное предложение. Звоните!
                                        </p>
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
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ad amet
                                                consectetur
                                                culpa dolorem dolores eligendi eos est et hic, impedit ipsum
                                                laboriosam
                                                libero
                                                maiores maxime perferendis quisquam ratione reiciendis repellendus
                                                repudiandae
                                                sint soluta totam veniam voluptas voluptatem. Itaque laborum magni
                                                qui
                                                quod rem
                                                rerum similique! Accusantium aliquid, dignissimos dolor dolorem
                                                ducimus
                                                ea est
                                                et eveniet iusto necessitatibus obcaecati odio provident quisquam
                                                reiciendis
                                                soluta vel velit? Alias debitis dolores earum eligendi et ex laborum
                                                nemo nulla.
                                                Corporis eum excepturi rem, sequi sint voluptates. At ipsam ipsum
                                                nihil
                                                obcaecati, quibusdam recusandae. Accusamus adipisci dolorem eveniet
                                                excepturi
                                                modi necessitatibus non similique! Porro?
                                            </p>
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
                                            <span>Польша</span>
                                        </div>
                                        <div class="list-properties__item">
                                            <span>Город</span>
                                            <span>Варшава</span>
                                        </div>
                                        <div class="list-properties__item">
                                            <span>Категория</span>
                                            <span>Коммерческая</span>
                                        </div>
                                        <hr>
                                        <div class="list-properties__item">
                                            <span>Окупаемость</span>
                                            <span><b>78 месяцев</b></span>
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
                                        <hr>
                                        <div class="list-properties__item">
                                            <span>Цена в евро</span>
                                            <span><b>18 000 560</b></span>
                                        </div>
                                        <div class="list-properties__item">
                                            <span>Цена в злотых</span>
                                            <span><b>76 959 192</b></span>
                                        </div>
                                        <div class="list-properties__item">
                                            <span>Цена в биткоинах</span>
                                            <span><b>5,456.56</b></span>
                                        </div>
                                    </div>
                                    <div class="buttons">
                                        <a href="#" class="button is-success is-fullwidth has-text-weight-bold is-size-875">Получить документы</a>
                                        <a href="#" class="button is-success is-outlined is-fullwidth has-text-weight-bold is-size-875">Заказать продукт</a>
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
        <div class="modal-content">
            <div class="card">
                <div class="card-content">
                    <p class="title">
                        “There are two hard things in computer science: cache invalidation, naming things, and
                        off-by-one errors.”
                    </p>
                    <p class="subtitle">
                        Jeff Atwood
                    </p>
                </div>
            </div>
        </div>
        <button aria-label="close" class="delete close-modal" @click="hideModal('modal-question-object')"></button>
    </div>

    <!-- Modal -->
    <div class="modal" id="modal-how-purchase">
        <div class="modal-background" @click="hideModal('modal-how-purchase')"></div>
        <div class="modal-content">
            <div class="card">
                <div class="card-content">
                    <p class="title">
                        Как происходит покупка
                    </p>
                    <p class="subtitle">
                        Jeff Atwood
                    </p>
                </div>
            </div>
        </div>
        <button aria-label="close" class="delete close-modal" @click="hideModal('modal-how-purchase')"></button>
    </div>
@endsection
