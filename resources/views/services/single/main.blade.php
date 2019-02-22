@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <div class="services-single">
        @include('services.parts.single-header')

        <section class="section has-background-white">
            <div class="container">
                <div class="columns is-multiline">
                    <div class="column is-6">
                        <div class="content">
                            <h2 class="mb-1">Анотация</h2>
                            <div class="is-size-875">
                                <p>
                                    Социальный статус, согласно Ф.Котлеру, версифицирован. Product placement, на первый
                                    взгляд, ригиден как никогда. Фокусировка, не меняя концепции, изложенной выше,
                                    регулярно
                                    ускоряет побочный PR-эффект. Таргетирование изменяет межличностный потребительский
                                    рынок. Более того, мониторинг активности индуцирует комплексный медиамикс.
                                </p>
                                <p>
                                    Комплексный анализ ситуации изящно притягивает комплексный целевой сегмент рынка.
                                    Программа лояльности выражена наиболее полно. Сервисная стратегия стабилизирует
                                    конструктивный традиционный канал. Маркетинг синхронизирует формат события.
                                    Восприятие
                                    марки специфицирует ролевой план размещения, осознав маркетинг как часть
                                    производства
                                </p>
                            </div>
                            <div class="mt-2-5">
                                <div class="is-size-875 mb-0-5">Стоимость продукта</div>
                                <div class="price-info">
                                    <span class="tag is-danger price-sale">-13%</span>
                                    <div class="price">€150 за подбор</div>
                                    <span class="price-old">€250</span>
                                </div>
                                <div class="buttons mb-0">
                                    <a href="#" class="button is-link is-size-875 h-3 has-text-weight-bold px-1-5">
                                        Заказать продукт
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <figure class="is-marginless h-full w-full">
                            <img
                                src="https://www.androidcentral.com/sites/androidcentral.com/files/styles/xlarge/public/article_images/2019/01/galaxy-s10-onleaks%20cropped.jpg?itok=HX0JXkaa"
                                alt=""
                                class="img-full-cover has-border-radius">
                        </figure>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="columns is-multiline">
                    <div class="column is-6">
                        <div class="content">
                            <h2 class="mb-1">Процесс</h2>
                            <div class="timeline-process">
                                <div class="timeline-process__item">
                                    <div class="timeline-process__item__tag">
                                        <span class="tag is-danger has-text-uppercase has-text-weight-bold is-rounded">Шаг 1</span>
                                    </div>
                                    <div class="timeline-process__item__marker">
                                        <img src="/svg/icons/service-process/ic_personla_manager.svg" alt="">
                                    </div>
                                    <div class="timeline-process__item__content">
                                        <h3 class="mb-0">Отправка заявки</h3>
                                        <p class="is-size-875">
                                            Проверка активов, а так же документов по каждому объекту
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-process__item">
                                    <div class="timeline-process__item__tag">
                                        <span class="tag is-danger has-text-uppercase has-text-weight-bold is-rounded">Шаг 2</span>
                                    </div>
                                    <div class="timeline-process__item__marker">
                                        <img src="/svg/icons/service-process/ic_priority.svg" alt="">
                                    </div>
                                    <div class="timeline-process__item__content">
                                        <h3 class="mb-0">Подготовка документов</h3>
                                        <p class="is-size-875">
                                            Проверка активов, а так же документов по каждому объекту. Проверка активов,
                                            а так же документов по каждому объекту.
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-process__item">
                                    <div class="timeline-process__item__tag">
                                        <span class="tag is-danger has-text-uppercase has-text-weight-bold is-rounded">Шаг 3</span>
                                    </div>
                                    <div class="timeline-process__item__marker">
                                        <img src="/svg/icons/service-process/ic_cold_search.svg" alt="">
                                    </div>
                                    <div class="timeline-process__item__content">
                                        <h3 class="mb-0">Осмотр и оценка</h3>
                                        <p class="is-size-875">
                                            Проверка активов, а так же документов по каждому объекту. Проверка
                                            документов
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-process__item">
                                    <div class="timeline-process__item__tag">
                                        <span class="tag is-danger has-text-uppercase has-text-weight-bold is-rounded">Шаг 4</span>
                                    </div>
                                    <div class="timeline-process__item__marker">
                                        <img src="/svg/icons/service-process/ic_priority.svg" alt="">
                                    </div>
                                    <div class="timeline-process__item__content">
                                        <h3 class="mb-0">Подписание договора</h3>
                                        <p class="is-size-875">
                                            Проверка активов, а так же документов по каждому объекту. Проверка активов,
                                            а так же документов по каждому объекту.
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-process__item">
                                    <div class="timeline-process__item__tag">
                                        <span class="tag is-danger has-text-uppercase has-text-weight-bold is-rounded">Шаг 5</span>
                                    </div>
                                    <div class="timeline-process__item__marker">
                                        <img src="/svg/icons/service-process/ic_personla_manager.svg" alt="">
                                    </div>
                                    <div class="timeline-process__item__content">
                                        <h3 class="mb-0">Получение кредита</h3>
                                        <p class="is-size-875">
                                            Проверка активов, а так же документов по каждому объекту.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="has-text-centered mt-1">
                                <a href="/services-new/single/process" class="has-text-decoration-underline is-size-875">Подробнее о процессе</a>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="our-team">
                            <h2 class="mb-1">Команда</h2>
                            <div class="columns is-multiline">
                                <div class="column is-6">
                                    <div class="our-team__item">
                                        <figure class="mb-0-5">
                                            <img
                                                src="https://s.pfst.net/2015.10/8515416672106b1d8b1dd45a0495f01e4b8a4d03b652_b.jpg"
                                                alt="">
                                        </figure>
                                        <h3>Станислав Суслов</h3>
                                        <div class="team__item__position is-size-875 has-text-basic">
                                            CEO, руководитель компании
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div class="our-team__item">
                                        <figure class="mb-0-5">
                                            <img
                                                src="https://s.pfst.net/2015.10/8515416672106b1d8b1dd45a0495f01e4b8a4d03b652_b.jpg"
                                                alt="">
                                        </figure>
                                        <h3>Станислав Суслов</h3>
                                        <div class="team__item__position is-size-875 has-text-basic">
                                            CEO, руководитель компании
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div class="our-team__item">
                                        <figure class="mb-0-5">
                                            <img
                                                src="https://s.pfst.net/2015.10/8515416672106b1d8b1dd45a0495f01e4b8a4d03b652_b.jpg"
                                                alt="">
                                        </figure>
                                        <h3>Станислав Суслов</h3>
                                        <div class="team__item__position is-size-875 has-text-basic">
                                            CEO, руководитель компании
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div class="is-flex has-align-items-center has-justify-content-center h-full">
                                        <a href="/services-new/single/team" class="button is-info is-size-875 has-text-weight-bold h-3 px-1">Подробнее
                                            о команде</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section has-background-white">
            <div class="container">
                <h2 class="mb-1">Промо-видео с описанием</h2>
                <video class="w-full has-border-radius has-box-shadow mb-2" controls="">
                    <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>
                <div class="box">
                    <div class="columns is-multiline">
                        <div class="column is-8">
                            <div class="content">
                                <p>Эксперты ожидают, что в 2019 году рост отрасли замедлится: прогнозируется, что
                                    McKinsey Global Fashion Index, который отслеживает продажи в отрасли, операционную
                                    прибыль и создание дополнительной стоимости, в следующем году составит 3,5–4,5 проц
                                    против 4–5 проц в 2018 году. Ухудшение прогноза на 2019 год связано с экономическими
                                    и политическими вызовами.</p>
                            </div>
                        </div>
                        <div class="column is-4">
                            <div>
                                <div class="is-size-875 mb-0-5">Стоимость продукта</div>
                                <div class="price-info">
                                    <span class="tag is-danger price-sale">-13%</span>
                                    <div class="price">€150 за подбор</div>
                                    <span class="price-old">€250</span>
                                </div>
                                <div class="buttons mb-0">
                                    <a href="#"
                                       class="button is-link is-size-875 h-3 has-text-weight-bold px-1-5 is-fullwidth">
                                        Заказать продукт
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <h2 class="has-text-centered mb-1">Наши кейсы</h2>
                <div class="columns is-multiline">
                    <div class="column is-4">
                        <a href="#" class="services-single__case-card is-block">
                            <div class="card has-border-radius card-case">
                                <div class="card-image">
                                    <figure class="image is-16by9">
                                        <img src="http://f-lounge.ru/wp-content/uploads/2014/07/IMG_6127.jpg"
                                             class="has-border-radius_top">
                                    </figure>
                                </div>
                                <div class="card-content">
                                    <div class="content">
                                        OZON полностью перевел штаб-квартиру в «Москва-Сити»
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                    <div class="column is-4">
                        <a href="#" class="services-single__case-card is-block">
                            <div class="card has-border-radius card-case">
                                <div class="card-image">
                                    <figure class="image is-16by9">
                                        <img src="http://f-lounge.ru/wp-content/uploads/2014/07/IMG_6127.jpg"
                                             class="has-border-radius_top">
                                    </figure>
                                </div>
                                <div class="card-content">
                                    <div class="content">
                                        OZON полностью перевел штаб-квартиру в «Москва-Сити»
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                    <div class="column is-4">
                        <a href="#" class="services-single__case-card is-block">
                            <div class="card has-border-radius card-case">
                                <div class="card-image">
                                    <figure class="image is-16by9">
                                        <img src="http://f-lounge.ru/wp-content/uploads/2014/07/IMG_6127.jpg"
                                             class="has-border-radius_top">
                                    </figure>
                                </div>
                                <div class="card-content">
                                    <div class="content">
                                        OZON полностью перевел штаб-квартиру в «Москва-Сити»
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                    <div class="column is-12">
                        <div class="buttons is-marginless has-justify-content-center">
                            <a href="#" class="button is-info is-outlined h-3 has-text-weight-bold is-size-875 px-1">Смотреть все кейсы</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('services.parts.single-similar')

    </div>
@endsection
