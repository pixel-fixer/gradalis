@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <div class="object">
        <!-- Section object header -->
        <section class="section pt-1 pb-0">
            <div class="container">
                <div class="object__header">
                    <h1 class="section-title">«МЯСОROOB» – франшиза сети сибирских бургерных</h1>
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
                <div class="object__body">
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
                            <div class="object__broker__top">
                                <div class="is-flex">
                                    <div class="object__broker__top__left">
                                        <figure class="object__broker__avatar">
                                            <img
                                                src="https://image.freepik.com/free-photo/no-translate-detected_23-2147650966.jpg"
                                                alt="">
                                        </figure>
                                    </div>
                                    <div class="object__broker__top__right">
                                        <div
                                            class="is-size-6 has-text-info has-text-weight-bold has-text-decoration-underline">
                                            Анна Кириченко
                                        </div>
                                        <div class="object__broker__info is-size-875">
                                            Брокер сделки
                                        </div>
                                    </div>
                                </div>
                                <hr class="hr-basic my-1">
                                <div class="price-info">
                                    <span class="tag is-danger price-sale">-10%</span>
                                    <div class="price mb-0">8 891 375 zt</div>
                                    <span class="price-old">9 879 306 zt</span>
                                </div>
                                <div class="has-text-basic is-size-875">Размер инвестиций</div>
                            </div>
                            <div class="object__broker__bottom is-flex">
                                {{-- TODO временная заглушка --}}
                                <a href="/profile/chat"
                                   class="button is-success is-size-875 has-text-weight-bold modal-button">
                                    <img src="{{ asset('/svg/icons/ic_ask_question.svg') }}" alt="">
                                    <span>Написать брокеру</span>
                                </a>
                            </div>
                        </div>

                        <a href="#"
                           class="info-icon object-favorite" v-tooltip="'Добавить в избранное'">
                            <img src="{{ asset('/svg/icons/ic_favorites_white.svg') }}" alt="Fav">
                        </a>

                    </div>

                    <div class="franchise-info mt-2 mb-2">
                        <div class="columns is-multiline">
                            <div class="column is-4">
                                <div class="franchise-info__company box">
                                    <div class="columns is-multiline">
                                        <div class="column is-4">
                                            <figure class="franchise-info__company__logo is-marginless">
                                                <img src="https://www.trud.com/images/company-logo/75139.jpeg" alt="">
                                            </figure>
                                        </div>
                                        <div class="column is-8">
                                            <div>
                                                <h3>METRO Cash & Carry</h3>
                                                <div class="location is-size-875 is-flex">
                                                    <div class="icon is-flex has-justify-content-start"><img
                                                            src="http://marketplacenew.local/svg/icons/ic_location.svg"
                                                            alt=""></div>
                                                    <div>Польша, г. Варшава</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-8">
                                <div class="box">
                                    <div class="columns is-multiline franchise-info__item-list">
                                        <div class="column is-3">
                                            <div class="franchise-info__item is-flex">
                                                <figure class="franchise-info__item__icon">
                                                    <img src="/img/franchises/ic_location.png" alt="">
                                                </figure>
                                                <div class="">
                                                    <b>Уже открыто</b>
                                                    <div class="has-text-weight-light">27 объектов</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-3">
                                            <div class="franchise-info__item is-flex">
                                                <figure class="franchise-info__item__icon">
                                                    <img src="/img/franchises/ic_money.png" alt="">
                                                </figure>
                                                <div class="">
                                                    <b>Пибыль в мес.</b>
                                                    <div class="has-text-weight-light">$5 000</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-3">
                                            <div class="franchise-info__item is-flex">
                                                <figure class="franchise-info__item__icon">
                                                    <img src="/img/franchises/ic_sale.png" alt="">
                                                </figure>
                                                <div class="">
                                                    <b>Роялти</b>
                                                    <div class="has-text-weight-light">20% в месяц</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column is-3">
                                            <div class="franchise-info__item is-flex">
                                                <figure class="franchise-info__item__icon">
                                                    <img src="/img/franchises/ic_graphic.png" alt="">
                                                </figure>
                                                <div class="">
                                                    <b>Окупаемость</b>
                                                    <div class="has-text-weight-light">5 мес</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tabs-wrap">
                        <div class="tabs is-size-875 is-marginless">
                            <ul>
                                <li class="tab is-active"
                                    onclick="openTab(event,'tab-main-info')">
                                    <a class="h-3 px-1-5">
                                        <span>Общая информация</span>
                                    </a>
                                </li>
                                <li class="tab"
                                    onclick="openTab(event,'tab-news')">
                                    <a class="h-3 px-1-5">
                                        <span>Новости франшизы</span>
                                    </a>
                                </li>
                                <li class="tab"
                                    onclick="openTab(event,'tab-open-projects')">
                                    <a class="h-3 px-1-5">
                                        <span>Открытые проекты</span>
                                    </a>
                                </li>
                                <li class="tab"
                                    onclick="openTab(event,'tab-reviews')">
                                    <a class="h-3 px-1-5">
                                        <span>Отзывы</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="box">
                            <div class="columns is-multiline">
                                <div class="column is-8">
                                    <div id="tab-main-info" class="content-tab">
                                        <div class="content">
                                            <h2>Описание франшизы</h2>
                                            <p>
                                                Кофейня расположена в локации с крайне высоким трафиком. Вокруг большое
                                                количество бизнес-центров, гостиниц и т.п. Первый, не цокольный этаж.
                                                Свой отдельный вход с первой линии. В качестве наружной рекламы,
                                                установлена яркая световая вывеска. Согласована с комитетом по рекламе.
                                            </p>
                                            <p>
                                                Кофейня находится в помещении площадью 57 кв.м. Удачная планировка –
                                                максимум открытого пространства, подсобное помещение и уборная. Сделан
                                                дизайнерский ремонт. Установлена качественное новое оборудование, все в
                                                собственности. Для посетителей, желающих провести время в кофейне,
                                                сделана комфортная зона на 30 посадочными мест со столиками. В
                                                ассортименте представлен кофе высокого качества с уникальными условиями
                                                от поставщика. Также кондитерские изделия, салаты и сэндвичи.
                                            </p>
                                            <div class="columns is-multiline">
                                                <div class="column is-4">
                                                    <img
                                                        src="http://tourismtur.ru/wp-content/uploads/%D0%9E%D1%82%D0%B5%D0%BB%D1%8C%20Viva%20la%20Hotel/1.jpg"
                                                        alt="" class="has-border-radius">
                                                </div>
                                                <div class="column is-4">
                                                    <img
                                                        src="http://tourismtur.ru/wp-content/uploads/%D0%9E%D1%82%D0%B5%D0%BB%D1%8C%20Viva%20la%20Hotel/1.jpg"
                                                        alt="" class="has-border-radius">
                                                </div>
                                                <div class="column is-4">
                                                    <img
                                                        src="http://tourismtur.ru/wp-content/uploads/%D0%9E%D1%82%D0%B5%D0%BB%D1%8C%20Viva%20la%20Hotel/1.jpg"
                                                        alt="" class="has-border-radius">
                                                </div>
                                            </div>
                                            <h2>Доступные пакеты при покупке</h2>
                                            <p>
                                                Франшиза предусматривает несколько пакетов на выбор. В зависимости от
                                                выбранного пакета будет манятся комплектация поддержки и прочее
                                            </p>
                                            <div class="columns is-multiline">
                                                <div class="column is-4">
                                                    <div class="card-franchise-package has-text-centered p-1-5">
                                                        <h5 class="card-franchise-package__title has-text-success has-text-weight-normal">
                                                            Базовый
                                                        </h5>
                                                        <div class="card-franchise-package__desc">
                                                            <div
                                                                class="is-size-7 card-franchise-package__desc__short has-text-weight-light">
                                                                <div class="mb-0-5">Клиентская база</div>
                                                                <div class="mb-0-5">Очное обучение франчайзи</div>
                                                                <div class="mb-0-5">Полная поддержка и сопровождение
                                                                    бизнеса
                                                                </div>
                                                                <div class="mb-0-5">Полная поддержка</div>
                                                            </div>
                                                            <div
                                                                class="is-size-7 card-franchise-package__desc__full has-text-weight-light">
                                                                <div>Кофейня находится в помещении площадью 57 кв.м.
                                                                    Удачная
                                                                    планировка – максимум открытого пространства,
                                                                    подсобное
                                                                    помещение и уборная. Сделан дизайнерский ремонт.
                                                                    Установлена качественное новое оборудование, все в
                                                                    собственности. Для посетителей, желающих провести
                                                                    время
                                                                    в кофейне, сделана комфортная зона на 30 посадочными
                                                                    мест со столиками. В ассортименте представлен кофе
                                                                    высокого..
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-franchise-package__footer">
                                                            <div
                                                                class="card-franchise-package__price is-size-875 has-text-weight-bold has-text-dark-blue">
                                                                $ 48 000
                                                            </div>
                                                            <div class="is-size-7 has-text-basic">
                                                                Роялти 20% в мес.
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="column is-4">
                                                    <div class="card-franchise-package has-text-centered p-1-5">
                                                        <h5 class="card-franchise-package__title has-text-link has-text-weight-normal">
                                                            Премиум
                                                        </h5>
                                                        <div class="card-franchise-package__desc">
                                                            <div
                                                                class="is-size-7 card-franchise-package__desc__short has-text-weight-light">
                                                                <div class="mb-0-5">Клиентская база</div>
                                                                <div class="mb-0-5">Очное обучение франчайзи</div>
                                                                <div class="mb-0-5">Полная поддержка и сопровождение
                                                                    бизнеса
                                                                </div>
                                                                <div class="mb-0-5">Полная поддержка</div>
                                                            </div>
                                                            <div
                                                                class="is-size-7 card-franchise-package__desc__full has-text-weight-light">
                                                                <div>Кофейня находится в помещении площадью 57 кв.м.
                                                                    Удачная
                                                                    планировка – максимум открытого пространства,
                                                                    подсобное
                                                                    помещение и уборная. Сделан дизайнерский ремонт.
                                                                    Установлена качественное новое оборудование, все в
                                                                    собственности. Для посетителей, желающих провести
                                                                    время
                                                                    в кофейне, сделана комфортная зона на 30 посадочными
                                                                    мест со столиками. В ассортименте представлен кофе
                                                                    высокого..
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-franchise-package__footer">
                                                            <div
                                                                class="card-franchise-package__price is-size-875 has-text-weight-bold has-text-dark-blue">
                                                                $ 48 000
                                                            </div>
                                                            <div class="is-size-7 has-text-basic">
                                                                Роялти 20% в мес.
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="column is-4">
                                                    <div class="card-franchise-package has-text-centered p-1-5">
                                                        <h5 class="card-franchise-package__title has-text-danger has-text-weight-normal">
                                                            VIP
                                                        </h5>
                                                        <div class="card-franchise-package__desc">
                                                            <div
                                                                class="is-size-7 card-franchise-package__desc__short has-text-weight-light">
                                                                <div class="mb-0-5">Клиентская база</div>
                                                                <div class="mb-0-5">Очное обучение франчайзи</div>
                                                                <div class="mb-0-5">Полная поддержка и сопровождение
                                                                    бизнеса
                                                                </div>
                                                                <div class="mb-0-5">Полная поддержка при
                                                                    открытии фирмы
                                                                </div>
                                                                <div class="mb-0-5">Очное обучение франчайзи</div>
                                                                <div class="mb-0-5">Поиск помещения</div>
                                                                <div class="mb-0-5">Книга стандартов сервиса</div>
                                                            </div>
                                                            <div
                                                                class="is-size-7 card-franchise-package__desc__full has-text-weight-light">
                                                                <div>Кофейня находится в помещении площадью 57 кв.м.
                                                                    Удачная
                                                                    планировка – максимум открытого пространства,
                                                                    подсобное
                                                                    помещение и уборная. Сделан дизайнерский ремонт.
                                                                    Установлена качественное новое оборудование, все в
                                                                    собственности. Для посетителей, желающих провести
                                                                    время
                                                                    в кофейне, сделана комфортная зона на 30 посадочными
                                                                    мест со столиками. В ассортименте представлен кофе
                                                                    высокого..
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-franchise-package__footer">
                                                            <div
                                                                class="card-franchise-package__price is-size-875 has-text-weight-bold has-text-dark-blue">
                                                                $ 102 000
                                                            </div>
                                                            <div class="is-size-7 has-text-basic">
                                                                Без роялти
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <h2>Видео презентация</h2>
                                            <video class="w-full has-border-radius has-box-shadow mb-2" controls="">
                                                <source src="https://www.w3schools.com/html/mov_bbb.mp4"
                                                        type="video/mp4">
                                                Your browser does not support HTML5 video.
                                            </video>
                                            <bulma-accordion :slide="{
                                                                    duration: '.3s',
                                                                    timerFunc: 'ease'
                                                                }"
                                                             :dropdown="true"
                                                             class="px-0">
                                                <bulma-accordion-item>
                                                    <h2 slot="title" class="mb-0 is-flex has-align-items-center">
                                                        <img
                                                            src="{{ asset('/svg/icons/ic_object_finance.svg') }}"
                                                            alt=""
                                                            class="icon mr-0-5">
                                                        <span>Финансовые показатели</span>
                                                    </h2>
                                                    <div slot="content" class="pb-1">
                                                        <div
                                                            class="object__info__list is-size-875 has-text-dark-blue">
                                                            <div class="object__info__list__item">
                                                                <span>Чистая прибыль в месяц</span>
                                                                <span>€ 10 000</span>
                                                            </div>
                                                            <div class="object__info__list__item">
                                                                <span>Окупаемость</span>
                                                                <span>€ 10 000</span>
                                                            </div>
                                                            <div class="object__info__list__item">
                                                                <span>Годовой оборот</span>
                                                                <span>€ 10 000</span>
                                                            </div>
                                                        </div>
                                                        <h3>Обоснование финансовых показателей</h3>
                                                        <p>Кофейня находится в помещении площадью 57 кв.м. Удачная
                                                            планировка – максимум открытого пространства, подсобное
                                                            помещение и уборная. Сделан дизайнерский ремонт. Установлена
                                                            качественное новое оборудование, все в собственности.</p>
                                                    </div>
                                                </bulma-accordion-item>
                                                <hr class="hr-basic is-marginless">
                                                <bulma-accordion-item>
                                                    <h2 slot="title" class="mb-0 is-flex has-align-items-center">
                                                        <img
                                                            src="{{ asset('/svg/icons/ic_object_building.svg') }}"
                                                            alt=""
                                                            class="icon mr-0-5">
                                                        <span>Недвижимость</span>
                                                    </h2>
                                                    <div slot="content" class="pb-1">
                                                        <div
                                                            class="object__info__list is-size-875 has-text-dark-blue">
                                                            <div class="object__info__list__item">
                                                                <span>Форма собсвенности</span>
                                                                <span>Аренда</span>
                                                            </div>
                                                            <div class="object__info__list__item">
                                                                <span>Тип постройки</span>
                                                                <span>Собственнoe коммерческое помещение</span>
                                                            </div>
                                                            <div class="object__info__list__item">
                                                                <span>Площадь м2</span>
                                                                <span>300 м2</span>
                                                            </div>
                                                            <div class="object__info__list__item">
                                                                <span>Огрничения по эксплуатции</span>
                                                                <span>Право проезда, Аварийное состояние</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </bulma-accordion-item>
                                                <hr class="hr-basic is-marginless">
                                                <bulma-accordion-item>
                                                    <h2 slot="title" class="mb-0 is-flex has-align-items-center">
                                                        <img
                                                            src="{{ asset('/svg/icons/ic_target_audience.svg') }}"
                                                            alt=""
                                                            class="icon mr-0-5">
                                                        <span>Целевая аудитория</span>
                                                    </h2>
                                                    <div slot="content" class="pb-1">
                                                        <div
                                                            class="object__info__list is-size-875 has-text-dark-blue">
                                                            <div class="object__info__list__item">
                                                                <span>Тип аудитории на которую расчитан бизнес</span>
                                                                <span>B2C </span>
                                                            </div>
                                                            <div class="object__info__list__item">
                                                                <span>Пол целевой аудитории</span>
                                                                <span>Мужской и женский</span>
                                                            </div>
                                                            <div class="object__info__list__item">
                                                                <span>Возраст</span>
                                                                <span>30-50</span>
                                                            </div>
                                                            <div class="object__info__list__item">
                                                                <span>Семейный статус</span>
                                                                <span>Семья с детьми</span>
                                                            </div>
                                                            <div class="object__info__list__item">
                                                                <span>Средний уровень доходов целевых клиентов </span>
                                                                <span>1000 zł в мес.</span>
                                                            </div>
                                                            <div class="object__info__list__item">
                                                                <span>Средний чек клиента</span>
                                                                <span>500 zł</span>
                                                            </div>
                                                            <div class="object__info__list__item">
                                                                <span>Основные рекламные источники привлечение клиентов *</span>
                                                                <span>Наружная реклама, Интернет-Онлайн</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </bulma-accordion-item>
                                                <hr class="hr-basic is-marginless">
                                                <bulma-accordion-item>
                                                    <h2 slot="title" class="mb-0 is-flex has-align-items-center">
                                                        <img
                                                            src="{{ asset('/svg/icons/ic_law_form.svg') }}"
                                                            alt=""
                                                            class="icon mr-0-5">
                                                        <span>Юридическое состояние</span>
                                                    </h2>
                                                    <div slot="content" class="pb-1">
                                                        <div
                                                            class="object__info__list is-size-875 has-text-dark-blue">
                                                            <div class="object__info__list__item">
                                                                <span>Юридический статус</span>
                                                                <span>ЗАО</span>
                                                            </div>
                                                            <div class="object__info__list__item">
                                                                <span>Система налогообложения</span>
                                                                <span>Налоговая карта</span>
                                                            </div>
                                                            <div class="object__info__list__item">
                                                                <span>Основная деятельность</span>
                                                                <span>Ресторанный бизнес</span>
                                                            </div>
                                                            <div class="object__info__list__item">
                                                                <span>Изменения профиля деятельности в юридическом лице </span>
                                                                <span>Нет</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </bulma-accordion-item>
                                                <hr class="hr-basic is-marginless">
                                                <bulma-accordion-item>
                                                    <h2 slot="title" class="mb-0 is-flex has-align-items-center">
                                                        <img
                                                            src="{{ asset('/svg/icons/ic_process.svg') }}"
                                                            alt=""
                                                            class="icon mr-0-5">
                                                        <span>Бизнес-процессы</span>
                                                    </h2>
                                                    <div slot="content" class="pb-1">
                                                        <div
                                                            class="object__info__list is-size-875 has-text-dark-blue">
                                                            <div class="object__info__list__item">
                                                                <span>Схемы работы</span>
                                                                <span>Передаем</span>
                                                            </div>
                                                            <div class="object__info__list__item">
                                                                <span>Обучение</span>
                                                                <span>Входит</span>
                                                            </div>
                                                            <div class="object__info__list__item">
                                                                <span>База клиентов</span>
                                                                <span>Передаем</span>
                                                            </div>
                                                            <div class="object__info__list__item">
                                                                <span>Сертификаты</span>
                                                                <span>Не нужны</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </bulma-accordion-item>
                                                <hr class="hr-basic is-marginless">

                                            </bulma-accordion>
                                            <h2>Обучение и поддержка</h2>
                                            <p>Удачная планировка – максимум открытого пространства, подсобное помещение
                                                и уборная. Сделан дизайнерский ремонт. Установлена качественное новое
                                                оборудование, все в собственности. Для посетителей, желающих провести
                                                время в кофейне, сделана комфортная зона на 30 посадочными мест </p>
                                            <div class="buttons">
                                                <button @click="franchise.showModalBuy = true"
                                                        class="button is-success px-1 has-text-weight-bold is-size-875 h-3">
                                                    Купить франшизу
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-news" class="content-tab" style="display: none;">
                                        <div class="content">
                                            <h2>Новости франшизы</h2>
                                            <div>
                                                <article class="franchise-news">
                                                    <div class="columns is-multiline is-gapless is-marginless">
                                                        <div class="column is-6">
                                                            <figure class="franchise-news__thumb is-marginless">
                                                                <img
                                                                    src="http://tourismtur.ru/wp-content/uploads/%D0%9E%D1%82%D0%B5%D0%BB%D1%8C%20Viva%20la%20Hotel/1.jpg"
                                                                    alt="" class="has-border-radius">
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <h3 class="franchise-news__title">Первая попытка обучения —
                                                        Char-RNN</h3>
                                                    <time class="has-text-basic is-size-875 franchise-news__time">27
                                                        февраля 2019
                                                    </time>
                                                    <div>
                                                        <!-- Excerpt News -->
                                                        <p class="franchise-news__excerpt is-size-875">
                                                            Кофейня расположена в локации с крайне высоким трафиком.
                                                            Вокруг большое количество бизнес-центров, гостиниц и т.п.
                                                            Первый, не цокольный этаж. Свой отдельный вход с первой
                                                            линии. В качестве наружной рекламы, установлена яркая
                                                            световая вывеска. Согласована с комитетом по рекламе.
                                                        </p>
                                                        <bulma-accordion :slide="{
                                                                    duration: '.3s',
                                                                    timerFunc: 'ease'
                                                                }"
                                                                         :dropdown="true"
                                                                         class="accordion_flip accordion_with-excerpt px-0">
                                                            <bulma-accordion-item>
                                                                <div slot="title" class="mb-0">
                                                                    <span
                                                                        class="has-text-info has-text-decoration-underline has-text-weight-normal is-size-875">
                                                                         <span class="show">Смотреть полностью</span>
                                                                        <span class="hide">Закрыть</span>
                                                                    </span>
                                                                </div>
                                                                <div slot="content"
                                                                     class="pb-1 franchise-news__excerpt is-size-875">
                                                                    <!-- Continue News -->
                                                                    <p>Кофейня находится в помещении площадью 57 кв.м.
                                                                        Удачная
                                                                        планировка – максимум открытого пространства,
                                                                        подсобное
                                                                        помещение и уборная. Сделан дизайнерский ремонт.
                                                                        Установлена
                                                                        качественное новое оборудование, все в
                                                                        собственности.</p>
                                                                </div>
                                                            </bulma-accordion-item>
                                                        </bulma-accordion>
                                                    </div>
                                                </article>
                                                <article class="franchise-news">
                                                    <div class="columns is-multiline is-gapless is-marginless">
                                                        <div class="column is-6">
                                                            <figure class="franchise-news__thumb is-marginless">
                                                                <img
                                                                    src="http://tourismtur.ru/wp-content/uploads/%D0%9E%D1%82%D0%B5%D0%BB%D1%8C%20Viva%20la%20Hotel/1.jpg"
                                                                    alt="" class="has-border-radius">
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <h3 class="franchise-news__title">Первая попытка обучения —
                                                        Char-RNN</h3>
                                                    <time class="has-text-basic is-size-875 franchise-news__time">27
                                                        февраля 2019
                                                    </time>
                                                    <div>
                                                        <!-- Excerpt News -->
                                                        <p class="franchise-news__excerpt is-size-875">
                                                            Кофейня расположена в локации с крайне высоким трафиком.
                                                            Вокруг большое количество бизнес-центров, гостиниц и т.п.
                                                            Первый, не цокольный этаж. Свой отдельный вход с первой
                                                            линии. В качестве наружной рекламы, установлена яркая
                                                            световая вывеска. Согласована с комитетом по рекламе.
                                                        </p>
                                                        <bulma-accordion :slide="{
                                                                    duration: '.3s',
                                                                    timerFunc: 'ease'
                                                                }"
                                                                         :dropdown="true"
                                                                         class="accordion_flip accordion_with-excerpt px-0">
                                                            <bulma-accordion-item>
                                                                <div slot="title" class="mb-0">
                                                                    <span
                                                                        class="has-text-info has-text-decoration-underline has-text-weight-normal is-size-875">
                                                                         <span class="show">Смотреть полностью</span>
                                                                        <span class="hide">Закрыть</span>
                                                                    </span>
                                                                </div>
                                                                <div slot="content"
                                                                     class="pb-1 franchise-news__excerpt is-size-875">
                                                                    <!-- Continue News -->
                                                                    <p>Кофейня находится в помещении площадью 57 кв.м.
                                                                        Удачная
                                                                        планировка – максимум открытого пространства,
                                                                        подсобное
                                                                        помещение и уборная. Сделан дизайнерский ремонт.
                                                                        Установлена
                                                                        качественное новое оборудование, все в
                                                                        собственности.</p>
                                                                </div>
                                                            </bulma-accordion-item>
                                                        </bulma-accordion>
                                                    </div>
                                                </article>
                                                <article class="franchise-news">
                                                    <div class="columns is-multiline is-gapless is-marginless">
                                                        <div class="column is-6">
                                                            <figure class="franchise-news__thumb is-marginless">
                                                                <img
                                                                    src="http://tourismtur.ru/wp-content/uploads/%D0%9E%D1%82%D0%B5%D0%BB%D1%8C%20Viva%20la%20Hotel/1.jpg"
                                                                    alt="" class="has-border-radius">
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    <h3 class="franchise-news__title">Первая попытка обучения —
                                                        Char-RNN</h3>
                                                    <time class="has-text-basic is-size-875 franchise-news__time">27
                                                        февраля 2019
                                                    </time>
                                                    <div>
                                                        <!-- Excerpt News -->
                                                        <p class="franchise-news__excerpt is-size-875">
                                                            Кофейня расположена в локации с крайне высоким трафиком.
                                                            Вокруг большое количество бизнес-центров, гостиниц и т.п.
                                                            Первый, не цокольный этаж. Свой отдельный вход с первой
                                                            линии. В качестве наружной рекламы, установлена яркая
                                                            световая вывеска. Согласована с комитетом по рекламе.
                                                        </p>
                                                        <bulma-accordion :slide="{
                                                                    duration: '.3s',
                                                                    timerFunc: 'ease'
                                                                }"
                                                                         :dropdown="true"
                                                                         class="accordion_flip accordion_with-excerpt px-0">
                                                            <bulma-accordion-item>
                                                                <div slot="title" class="mb-0">
                                                                    <span
                                                                        class="has-text-info has-text-decoration-underline has-text-weight-normal is-size-875">
                                                                         <span class="show">Смотреть полностью</span>
                                                                        <span class="hide">Закрыть</span>
                                                                    </span>
                                                                </div>
                                                                <div slot="content"
                                                                     class="pb-1 franchise-news__excerpt is-size-875">
                                                                    <!-- Continue News -->
                                                                    <p>Кофейня находится в помещении площадью 57 кв.м.
                                                                        Удачная
                                                                        планировка – максимум открытого пространства,
                                                                        подсобное
                                                                        помещение и уборная. Сделан дизайнерский ремонт.
                                                                        Установлена
                                                                        качественное новое оборудование, все в
                                                                        собственности.</p>
                                                                </div>
                                                            </bulma-accordion-item>
                                                        </bulma-accordion>
                                                    </div>
                                                </article>
                                            </div>
                                            <div class="buttons">
                                                <button @click="franchise.showModalBuy = true"
                                                        class="button is-success px-1 has-text-weight-bold is-size-875 h-3">
                                                    Купить франшизу
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-open-projects" class="content-tab" style="display: none;">
                                        <div class="content">
                                            <h2>Открытые проекты</h2>
                                            <div>
                                                <article class="franchise-news">
                                                    <div class="columns is-multiline">
                                                        <div class="column is-6">
                                                            <figure class="franchise-news__thumb is-marginless">
                                                                <img
                                                                    src="http://tourismtur.ru/wp-content/uploads/%D0%9E%D1%82%D0%B5%D0%BB%D1%8C%20Viva%20la%20Hotel/1.jpg"
                                                                    alt="" class="has-border-radius">
                                                            </figure>
                                                        </div>
                                                        <div class="column is-6">
                                                            <h3 class="franchise-news__title">Первая попытка
                                                                обучения —
                                                                Char-RNN</h3>
                                                            <div
                                                                class="location is-size-875 is-flex has-align-items-center">
                                                                <div class="icon is-flex has-justify-content-start"><img
                                                                        src="http://marketplacenew.local/svg/icons/ic_location.svg"
                                                                        alt=""></div>
                                                                <div>Poland, Warsaw, Zamkowy Square 1/13, 00-262</div>
                                                            </div>
                                                            <div class="is-size-875 has-text-dark-blue mt-1">
                                                                <div>Zamkowy Square 1/13, 00-262 Warsaw, Poland</div>
                                                                <div>Телефон/Факс: (22) 635 1881.</div>
                                                                <div>E-mail: wcit.ag.mufa@supermedia.pl</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <!-- Excerpt News -->
                                                        <p class="franchise-news__excerpt is-size-875">
                                                            Кофейня расположена в локации с крайне высоким трафиком.
                                                            Вокруг большое количество бизнес-центров, гостиниц и т.п.
                                                            Первый, не цокольный этаж. Свой отдельный вход с первой
                                                            линии. В качестве наружной рекламы, установлена яркая
                                                            световая вывеска. Согласована с комитетом по рекламе.
                                                        </p>
                                                        <bulma-accordion :slide="{
                                                                    duration: '.3s',
                                                                    timerFunc: 'ease'
                                                                }"
                                                                         :dropdown="true"
                                                                         class="accordion_flip accordion_with-excerpt px-0">
                                                            <bulma-accordion-item>
                                                                <div slot="title" class="mb-0">
                                                                    <span
                                                                        class="has-text-info has-text-decoration-underline has-text-weight-normal is-size-875">
                                                                        <span class="show">Смотреть полностью</span>
                                                                        <span class="hide">Закрыть</span>
                                                                    </span>
                                                                </div>
                                                                <div slot="content"
                                                                     class="pb-1 franchise-news__excerpt is-size-875">
                                                                    <!-- Continue News -->
                                                                    <p>Кофейня находится в помещении площадью 57 кв.м.
                                                                        Удачная
                                                                        планировка – максимум открытого пространства,
                                                                        подсобное
                                                                        помещение и уборная. Сделан дизайнерский ремонт.
                                                                        Установлена
                                                                        качественное новое оборудование, все в
                                                                        собственности.</p>
                                                                </div>
                                                            </bulma-accordion-item>
                                                        </bulma-accordion>
                                                    </div>
                                                </article>
                                                <article class="franchise-news">
                                                    <div class="columns is-multiline">
                                                        <div class="column is-6">
                                                            <figure class="franchise-news__thumb is-marginless">
                                                                <img
                                                                    src="http://tourismtur.ru/wp-content/uploads/%D0%9E%D1%82%D0%B5%D0%BB%D1%8C%20Viva%20la%20Hotel/1.jpg"
                                                                    alt="" class="has-border-radius">
                                                            </figure>
                                                        </div>
                                                        <div class="column is-6">
                                                            <h3 class="franchise-news__title">Первая попытка
                                                                обучения —
                                                                Char-RNN</h3>
                                                            <div
                                                                class="location is-size-875 is-flex has-align-items-center">
                                                                <div class="icon is-flex has-justify-content-start"><img
                                                                        src="http://marketplacenew.local/svg/icons/ic_location.svg"
                                                                        alt=""></div>
                                                                <div>Poland, Warsaw, Zamkowy Square 1/13, 00-262</div>
                                                            </div>
                                                            <div class="is-size-875 has-text-dark-blue mt-1">
                                                                <div>Zamkowy Square 1/13, 00-262 Warsaw, Poland</div>
                                                                <div>Телефон/Факс: (22) 635 1881.</div>
                                                                <div>E-mail: wcit.ag.mufa@supermedia.pl</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <!-- Excerpt News -->
                                                        <p class="franchise-news__excerpt is-size-875">
                                                            Кофейня расположена в локации с крайне высоким трафиком.
                                                            Вокруг большое количество бизнес-центров, гостиниц и т.п.
                                                            Первый, не цокольный этаж. Свой отдельный вход с первой
                                                            линии. В качестве наружной рекламы, установлена яркая
                                                            световая вывеска. Согласована с комитетом по рекламе.
                                                        </p>
                                                        <bulma-accordion :slide="{
                                                                    duration: '.3s',
                                                                    timerFunc: 'ease'
                                                                }"
                                                                         :dropdown="true"
                                                                         class="accordion_flip accordion_with-excerpt px-0">
                                                            <bulma-accordion-item>
                                                                <div slot="title" class="mb-0">
                                                                    <span
                                                                        class="has-text-info has-text-decoration-underline has-text-weight-normal is-size-875">
                                                                        <span class="show">Смотреть полностью</span>
                                                                        <span class="hide">Закрыть</span>
                                                                    </span>
                                                                </div>
                                                                <div slot="content"
                                                                     class="pb-1 franchise-news__excerpt is-size-875">
                                                                    <!-- Continue News -->
                                                                    <p>Кофейня находится в помещении площадью 57 кв.м.
                                                                        Удачная
                                                                        планировка – максимум открытого пространства,
                                                                        подсобное
                                                                        помещение и уборная. Сделан дизайнерский ремонт.
                                                                        Установлена
                                                                        качественное новое оборудование, все в
                                                                        собственности.</p>
                                                                </div>
                                                            </bulma-accordion-item>
                                                        </bulma-accordion>
                                                    </div>
                                                </article>
                                                <article class="franchise-news">
                                                    <div class="columns is-multiline">
                                                        <div class="column is-6">
                                                            <figure class="franchise-news__thumb is-marginless">
                                                                <img
                                                                    src="http://tourismtur.ru/wp-content/uploads/%D0%9E%D1%82%D0%B5%D0%BB%D1%8C%20Viva%20la%20Hotel/1.jpg"
                                                                    alt="" class="has-border-radius">
                                                            </figure>
                                                        </div>
                                                        <div class="column is-6">
                                                            <h3 class="franchise-news__title">Первая попытка
                                                                обучения —
                                                                Char-RNN</h3>
                                                            <div
                                                                class="location is-size-875 is-flex has-align-items-center">
                                                                <div class="icon is-flex has-justify-content-start"><img
                                                                        src="http://marketplacenew.local/svg/icons/ic_location.svg"
                                                                        alt=""></div>
                                                                <div>Poland, Warsaw, Zamkowy Square 1/13, 00-262</div>
                                                            </div>
                                                            <div class="is-size-875 has-text-dark-blue mt-1">
                                                                <div>Zamkowy Square 1/13, 00-262 Warsaw, Poland</div>
                                                                <div>Телефон/Факс: (22) 635 1881.</div>
                                                                <div>E-mail: wcit.ag.mufa@supermedia.pl</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <!-- Excerpt News -->
                                                        <p class="franchise-news__excerpt is-size-875">
                                                            Кофейня расположена в локации с крайне высоким трафиком.
                                                            Вокруг большое количество бизнес-центров, гостиниц и т.п.
                                                            Первый, не цокольный этаж. Свой отдельный вход с первой
                                                            линии. В качестве наружной рекламы, установлена яркая
                                                            световая вывеска. Согласована с комитетом по рекламе.
                                                        </p>
                                                        <bulma-accordion :slide="{
                                                                    duration: '.3s',
                                                                    timerFunc: 'ease'
                                                                }"
                                                                         :dropdown="true"
                                                                         class="accordion_flip accordion_with-excerpt px-0">
                                                            <bulma-accordion-item>
                                                                <div slot="title" class="mb-0">
                                                                    <span
                                                                        class="has-text-info has-text-decoration-underline has-text-weight-normal is-size-875">
                                                                        <span class="show">Смотреть полностью</span>
                                                                        <span class="hide">Закрыть</span>
                                                                    </span>
                                                                </div>
                                                                <div slot="content"
                                                                     class="pb-1 franchise-news__excerpt is-size-875">
                                                                    <!-- Continue News -->
                                                                    <p>Кофейня находится в помещении площадью 57 кв.м.
                                                                        Удачная
                                                                        планировка – максимум открытого пространства,
                                                                        подсобное
                                                                        помещение и уборная. Сделан дизайнерский ремонт.
                                                                        Установлена
                                                                        качественное новое оборудование, все в
                                                                        собственности.</p>
                                                                </div>
                                                            </bulma-accordion-item>
                                                        </bulma-accordion>
                                                    </div>
                                                </article>
                                            </div>
                                            <div class="buttons">
                                                <button @click="franchise.showModalBuy = true"
                                                        class="button is-success px-1 has-text-weight-bold is-size-875 h-3">
                                                    Купить франшизу
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-reviews" class="content-tab" style="display: none;">
                                        <div class="content">
                                            <div class="columns is-multiline">
                                                <div class="column">
                                                    <h2>Отзывы о франшизе</h2>
                                                </div>
                                                <div class="column is-narrow">
                                                    <div class="buttons">
                                                        <button @click="franchise.showModalAddReview = true"
                                                                class="button is-info px-1 has-text-weight-bold is-size-875 h-3">
                                                            Добавить отзыв
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="is-size-875">
                                                <p>Целесообразно собрать отзывы и определить удовлетворенность
                                                    франчайзи, сильные и слабые стороны работы франчайзера, четкость
                                                    обратной связи с ним, наличие поддержки, соблюдение
                                                    обязательств, скорость решения задач, адекватность товара или
                                                    услуги текущим тенденциям, спросу, эффективность маркетинговых
                                                    инструментов, ценообразование и своевременность поставок</p>
                                            </div>
                                            <div class="mt-1">
                                                <!-- Swiper -->
                                                <div class="swiper-container swiper-franchise-reviews">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <div class="franchise-review">
                                                                <figure class="franchise-review__author-thumb">
                                                                    <img
                                                                        src="https://image.freepik.com/free-photo/no-translate-detected_23-2147650966.jpg"
                                                                        alt="">
                                                                </figure>
                                                                <div class="franchise-review__info">
                                                                    <h4>Говорухин Дмитрий</h4>
                                                                    <div class="is-size-7 has-text-basic">
                                                                        CEO, руководитель компании
                                                                    </div>
                                                                    <blockquote class="blockquote-v2 mt-1">
                                                                        Франшиза "Персональное решение" оправдала мои
                                                                        ожидания , бизнес развивается быстро
                                                                    </blockquote>
                                                                    <a @click="franchise.showModalShowReview = true"
                                                                       class="has-text-info has-text-decoration-underline is-size-875">
                                                                        Прочитать полную историю
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="franchise-review">
                                                                <figure class="franchise-review__author-thumb">
                                                                    <img
                                                                        src="https://image.freepik.com/free-photo/no-translate-detected_23-2147650966.jpg"
                                                                        alt="">
                                                                </figure>
                                                                <div class="franchise-review__info">
                                                                    <h4>Говорухин Дмитрий</h4>
                                                                    <div class="is-size-7 has-text-basic">
                                                                        CEO, руководитель компании
                                                                    </div>
                                                                    <blockquote class="blockquote-v2 mt-1">
                                                                        Франшиза "Персональное решение" оправдала мои
                                                                        ожидания , бизнес развивается быстро
                                                                    </blockquote>
                                                                    <a @click="franchise.showModalShowReview = true"
                                                                       class="has-text-info has-text-decoration-underline is-size-875">
                                                                        Прочитать полную историю
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="franchise-review">
                                                                <figure class="franchise-review__author-thumb">
                                                                    <img
                                                                        src="https://image.freepik.com/free-photo/no-translate-detected_23-2147650966.jpg"
                                                                        alt="">
                                                                </figure>
                                                                <div class="franchise-review__info">
                                                                    <h4>Говорухин Дмитрий</h4>
                                                                    <div class="is-size-7 has-text-basic">
                                                                        CEO, руководитель компании
                                                                    </div>
                                                                    <blockquote class="blockquote-v2 mt-1">
                                                                        Франшиза "Персональное решение" оправдала мои
                                                                        ожидания , бизнес развивается быстро
                                                                    </blockquote>
                                                                    <a @click="franchise.showModalShowReview = true"
                                                                       class="has-text-info has-text-decoration-underline is-size-875">
                                                                        Прочитать полную историю
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="franchise-review">
                                                                <figure class="franchise-review__author-thumb">
                                                                    <img
                                                                        src="https://image.freepik.com/free-photo/no-translate-detected_23-2147650966.jpg"
                                                                        alt="">
                                                                </figure>
                                                                <div class="franchise-review__info">
                                                                    <h4>Говорухин Дмитрий</h4>
                                                                    <div class="is-size-7 has-text-basic">
                                                                        CEO, руководитель компании
                                                                    </div>
                                                                    <blockquote class="blockquote-v2 mt-1">
                                                                        Франшиза "Персональное решение" оправдала мои
                                                                        ожидания , бизнес развивается быстро
                                                                    </blockquote>
                                                                    <a @click="franchise.showModalShowReview = true"
                                                                       class="has-text-info has-text-decoration-underline is-size-875">
                                                                        Прочитать полную историю
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="franchise-review">
                                                                <figure class="franchise-review__author-thumb">
                                                                    <img
                                                                        src="https://image.freepik.com/free-photo/no-translate-detected_23-2147650966.jpg"
                                                                        alt="">
                                                                </figure>
                                                                <div class="franchise-review__info">
                                                                    <h4>Говорухин Дмитрий</h4>
                                                                    <div class="is-size-7 has-text-basic">
                                                                        CEO, руководитель компании
                                                                    </div>
                                                                    <blockquote class="blockquote-v2 mt-1">
                                                                        Франшиза "Персональное решение" оправдала мои
                                                                        ожидания , бизнес развивается быстро
                                                                    </blockquote>
                                                                    <a @click="franchise.showModalShowReview = true"
                                                                       class="has-text-info has-text-decoration-underline is-size-875">
                                                                        Прочитать полную историю
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="franchise-review">
                                                                <figure class="franchise-review__author-thumb">
                                                                    <img
                                                                        src="https://image.freepik.com/free-photo/no-translate-detected_23-2147650966.jpg"
                                                                        alt="">
                                                                </figure>
                                                                <div class="franchise-review__info">
                                                                    <h4>Говорухин Дмитрий</h4>
                                                                    <div class="is-size-7 has-text-basic">
                                                                        CEO, руководитель компании
                                                                    </div>
                                                                    <blockquote class="blockquote-v2 mt-1">
                                                                        Франшиза "Персональное решение" оправдала мои
                                                                        ожидания , бизнес развивается быстро
                                                                    </blockquote>
                                                                    <a @click="franchise.showModalShowReview = true"
                                                                       class="has-text-info has-text-decoration-underline is-size-875">
                                                                        Прочитать полную историю
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="franchise-review">
                                                                <figure class="franchise-review__author-thumb">
                                                                    <img
                                                                        src="https://image.freepik.com/free-photo/no-translate-detected_23-2147650966.jpg"
                                                                        alt="">
                                                                </figure>
                                                                <div class="franchise-review__info">
                                                                    <h4>Говорухин Дмитрий</h4>
                                                                    <div class="is-size-7 has-text-basic">
                                                                        CEO, руководитель компании
                                                                    </div>
                                                                    <blockquote class="blockquote-v2 mt-1">
                                                                        Франшиза "Персональное решение" оправдала мои
                                                                        ожидания , бизнес развивается быстро
                                                                    </blockquote>
                                                                    <a @click="franchise.showModalShowReview = true"
                                                                       class="has-text-info has-text-decoration-underline is-size-875">
                                                                        Прочитать полную историю
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Add Arrows -->
                                                    <div class="swiper-button-next swiper-franchise-reviews-next"></div>
                                                    <div class="swiper-button-prev swiper-franchise-reviews-prev"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-4">
                                    <div class="object__basic-short-info">
                                        <div class="list-properties">
                                            <div class="list-properties__item">
                                                <span>Категория</span>
                                                <span>Общепит</span>
                                            </div>
                                            <div class="list-properties__item">
                                                <span>Направление</span>
                                                <span>Фаст-фуд</span>
                                            </div>
                                            <div class="list-properties__item">
                                                <span>Год основания компании</span>
                                                <span>1991</span>
                                            </div>
                                            <div class="list-properties__item">
                                                <span>Год основания франшизы</span>
                                                <span>2013</span>
                                            </div>
                                            <hr>
                                            <div class="list-properties__item">
                                                <span>Обороты в месяц</span>
                                                <span>€ 10 000</span>
                                            </div>
                                            <div class="list-properties__item">
                                                <span>Общие расходы</span>
                                                <span>€ 10 000</span>
                                            </div>
                                            <div class="list-properties__item">
                                                <span>Расходы в месяц</span>
                                                <span>€ 10 000</span>
                                            </div>
                                            <div class="list-properties__item">
                                                <span>Затраты на персонал</span>
                                                <span>€ 10 000</span>
                                            </div>
                                            <div class="list-properties__item">
                                                <span>Затраты на недвижимость</span>
                                                <span>€ 10 000</span>
                                            </div>
                                            <hr>
                                            <div class="list-properties__item">
                                                <span>Сроки запуска</span>
                                                <span>3 мес.</span>
                                            </div>
                                            <div class="list-properties__item">
                                                <span>Выход на оперц. прибыль</span>
                                                <span>3 мес.</span>
                                            </div>
                                            <div class="list-properties__item">
                                                <span>Выход на окупаемость</span>
                                                <span>3 мес.</span>
                                            </div>

                                        </div>
                                        <div class="buttons">
                                            <button
                                                @click="franchise.showModalBuy = true"
                                                class="button is-success is-fullwidth has-text-weight-bold is-size-875">
                                                Купить франшизу
                                            </button>
                                            <a href="#"
                                               class="button is-success is-outlined is-fullwidth has-text-weight-bold is-size-875">Получить
                                                документы</a>
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
            </div>
        </section>

        <!-- Section similar offers -->
        <section class="section">
            <div class="container">
                <h2 class="title section-title">Похожие предложения</h2>
                <div class="columns is-multiline">
                    <div class="column is-4">
                        <div class="card card-object">
                            <div class="card-image">
                                <figure class="image is-16by9"><img
                                        src="https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg"
                                        alt="Placeholder image"></figure>
                                <span class="tag tag-payback"><span class="name">прибыль в месяц</span> <span class="term">$ 25 000</span></span>
                                <!--<span class="info-icon object-promo">-->
                                <!--<img src="/svg/icons/ic_recommended.svg" alt="Recommended">-->
                                <!--</span>-->
                                <!--<span class="info-icon object-sale"><img src="/svg/icons/ic_sale.svg" alt="Sale"></span>-->
                                <a href="#" class="info-icon object-favorite has-tooltip"><img
                                        src="/svg/icons/ic_favorites_white.svg" alt="Fav"></a>
                            </div>
                            <div class="card-content">
                                <div class="card-object__header"><h3 class="title">ОАО ИнжВодСтрой</h3>
                                    <p class="location"><img src="/svg/icons/ic_location.svg" alt="Fav"><span>Польша, г. Билава
                                </span></p>
                                </div>
                                <div class="content card-object__content">
                                    <div class="list-properties">
                                        <div class="list-properties__item"><span>Категория</span> <span>IT-бизнес</span>
                                        </div>
                                        <div class="list-properties__item"><span>Размер инвестиций</span>
                                            <span><b>$48 000</b></span>
                                        </div>
                                        <div class="list-properties__item"><span>Окупаемость</span>
                                            <span><b>1 мес</b></span>
                                        </div>
                                        <div class="list-properties__item"><span>Без роялти</span> <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-object__footer">
                                    <a href="/franchises/single"
                                       class="button is-outlined is-fullwidth has-text-weight-bold is-info">Подробнее
                                        о франшизе</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-4">
                        <div class="card card-object">
                            <div class="card-image">
                                <figure class="image is-16by9"><img
                                        src="https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg"
                                        alt="Placeholder image"></figure>
                                <span class="tag tag-payback"><span class="name">прибыль в месяц</span> <span class="term">$ 25 000</span></span>
                                <!--<span class="info-icon object-promo">-->
                                <!--<img src="/svg/icons/ic_recommended.svg" alt="Recommended">-->
                                <!--</span>-->
                                <!--<span class="info-icon object-sale"><img src="/svg/icons/ic_sale.svg" alt="Sale"></span>-->
                                <a href="#" class="info-icon object-favorite has-tooltip"><img
                                        src="/svg/icons/ic_favorites_white.svg" alt="Fav"></a>
                            </div>
                            <div class="card-content">
                                <div class="card-object__header"><h3 class="title">ОАО ИнжВодСтрой</h3>
                                    <p class="location"><img src="/svg/icons/ic_location.svg" alt="Fav"><span>Польша, г. Билава
                                </span></p>
                                </div>
                                <div class="content card-object__content">
                                    <div class="list-properties">
                                        <div class="list-properties__item"><span>Категория</span> <span>IT-бизнес</span>
                                        </div>
                                        <div class="list-properties__item"><span>Размер инвестиций</span>
                                            <span><b>$48 000</b></span>
                                        </div>
                                        <div class="list-properties__item"><span>Окупаемость</span>
                                            <span><b>1 мес</b></span>
                                        </div>
                                        <div class="list-properties__item"><span>Без роялти</span> <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-object__footer">
                                    <a href="/franchises/single"
                                       class="button is-outlined is-fullwidth has-text-weight-bold is-info">Подробнее
                                        о франшизе</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-4">
                        <div class="card card-object">
                            <div class="card-image">
                                <figure class="image is-16by9"><img
                                        src="https://www.hoteloxford.com/data/jpg/foto-galleria-130.jpg"
                                        alt="Placeholder image"></figure>
                                <span class="tag tag-payback"><span class="name">прибыль в месяц</span> <span class="term">$ 25 000</span></span>
                                <!--<span class="info-icon object-promo">-->
                                <!--<img src="/svg/icons/ic_recommended.svg" alt="Recommended">-->
                                <!--</span>-->
                                <!--<span class="info-icon object-sale"><img src="/svg/icons/ic_sale.svg" alt="Sale"></span>-->
                                <a href="#" class="info-icon object-favorite has-tooltip"><img
                                        src="/svg/icons/ic_favorites_white.svg" alt="Fav"></a>
                            </div>
                            <div class="card-content">
                                <div class="card-object__header"><h3 class="title">ОАО ИнжВодСтрой</h3>
                                    <p class="location"><img src="/svg/icons/ic_location.svg" alt="Fav"><span>Польша, г. Билава
                                </span></p>
                                </div>
                                <div class="content card-object__content">
                                    <div class="list-properties">
                                        <div class="list-properties__item"><span>Категория</span> <span>IT-бизнес</span>
                                        </div>
                                        <div class="list-properties__item"><span>Размер инвестиций</span>
                                            <span><b>$48 000</b></span>
                                        </div>
                                        <div class="list-properties__item"><span>Окупаемость</span>
                                            <span><b>1 мес</b></span>
                                        </div>
                                        <div class="list-properties__item"><span>Без роялти</span> <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-object__footer">
                                    <a href="/franchises/single"
                                       class="button is-outlined is-fullwidth has-text-weight-bold is-info">Подробнее
                                        о франшизе</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal -->
    <modal-buy-franchise :show="franchise.showModalBuy" @close="franchise.showModalBuy = false"></modal-buy-franchise>

    <!-- Modal -->
    <modal-add-review-franchise :show="franchise.showModalAddReview"
                                @close="franchise.showModalAddReview = false"></modal-add-review-franchise>

    <!-- Modal -->
    <modal-show-review-franchise :show="franchise.showModalShowReview"
                                 @close="franchise.showModalShowReview = false"></modal-show-review-franchise>

    <!-- Modal -->
    <div class="modal" id="modal-how-purchase">
        <div class="modal-background" @click="hideModal('modal-how-purchase')"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Как происходит покупка?</p>
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
                            к продавцу бизнеса
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
