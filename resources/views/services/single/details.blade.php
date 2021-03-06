@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <div class="services-single">
        @include('services.parts.single-header')

        <section class="section">
            <div class="container">
                <div class="columns is-multiline">
                    <div class="column is-8">
                        <div class="box">
                            <div class="content">
                                <h1 class="mb-2">FCG: четыре радикальных тренда на рынке одежды в 2019 году</h1>
                                <figure class="is-marginless mb-1">
                                    <img src="http://laudator.ru/wp-content/uploads/2013/08/magazin-odezhdyi.jpg" alt=""
                                         class="has-border-radius">
                                </figure>
                                <div class="content">
                                    <p style="font-style: italic; font-size: 18px; color: #596C80;">
                                        The Business of Fashion (BoF) и McKinsey & Company обнародовали список главных
                                        трендов
                                        фэшн-бизнеса будущего года. В исследовании The State of Fashion 2019
                                        перечисляются 10
                                        основных тенденций. Перевод обзора публикует Inc.
                                    </p>
                                    <p>
                                        Эксперты ожидают, что в 2019 году рост отрасли замедлится: прогнозируется, что
                                        McKinsey
                                        Global Fashion Index, который отслеживает продажи в отрасли, операционную
                                        прибыль и
                                        создание дополнительной стоимости, в следующем году составит 3,5–4,5 проц против
                                        4–5
                                        проц в 2018 году. Ухудшение прогноза на 2019 год связано с экономическими и
                                        политическими вызовами в России, Африке, Латинской Америке, а также на Ближнем
                                        Востоке,
                                        которые могут снизить потребительские расходы. В отчете также говорится, что в
                                        2019 году
                                        Китай впервые обойдет США и станет крупнейшим модным рынком в мире.
                                    </p>
                                    <h2>10 основных трендов фэшн-бизнеса</h2>
                                    <p>
                                        «Участники модного рынка начали заблаговременно смотреть на возможности, а не
                                        просто
                                        фокусироваться на предстоящих вызовах», — говорится в исследовании. Авторы
                                        ожидают, что
                                        основной импульс роста будет поступать с рынков люксовых товаров, а также от
                                        развивающихся рынков в Азии.
                                    </p>
                                    <div class="notification notification_v2 is-success">
                                        <div class="notification__icon">
                                            <img src="/svg/icons/notification/ic_warning_success.svg" class="svg" alt="">
                                        </div>
                                        <div class="notification__content-wrap">
                                            <h5 class="notification__title has-text-weight-bold is-marginless">
                                                Примите к сведению
                                            </h5>
                                            <div class="notification__content is-size-875">
                                                Давно выяснено, что при оценке дизайна и композиции читаемый текст
                                                мешает сосредоточиться. Lorem Ipsum используют потому, что тот
                                                обеспечивает
                                            </div>
                                        </div>
                                    </div>
                                    <h3>Осторожность</h3>
                                    <p>
                                        В отрасли возникнут опасливые настроения из-за ослабления ключевых экономических
                                        показателей и других потенциально дестабилизирующих сил, ожидают в BoF и
                                        McKinsey.
                                        Представители модной индустрии начнут действовать осторожнее из-за опасений
                                        возможного
                                        замедления мировой экономики к 2020 году и будут активнее изучать свои
                                        возможности для
                                        повышения производительности.
                                    </p>
                                    <div class="notification notification_v2 is-danger">
                                        <div class="notification__icon">
                                            <img src="/svg/icons/notification/ic_warning_danger.svg" class="svg" alt="">
                                        </div>
                                        <div class="notification__content-wrap">
                                            <h5 class="notification__title has-text-weight-bold is-marginless">
                                                Внимание!
                                            </h5>
                                            <div class="notification__content is-size-875">
                                                Давно выяснено, что при оценке дизайна и композиции читаемый текст
                                                мешает сосредоточиться. Lorem Ipsum используют потому, что тот
                                                обеспечивает
                                            </div>
                                        </div>
                                    </div>
                                    <h3>Торговля 2.0</h3>
                                    <p>Компаниям нужно подготовить планы экстренных мероприятий на случай возможной
                                        реорганизации мировых производственно-бытовых связей.</p>
                                    <ul>
                                        <li>Бизнес-план</li>
                                        <li>Интеграция</li>
                                        <li>Вторичная бухгалтерия</li>
                                    </ul>
                                    <p>Кроме того, сферу торговли одеждой могут изменить новые барьеры, напряженность в
                                        вопросах
                                        торговли и неопределенность, а новые возможности могут появиться на фоне
                                        усиления
                                        торговли между развивающимися странами и пересмотра торговых соглашений.</p>
                                    <blockquote style="font-size: 24px;">
                                        Количество упоминаний слова feminist в рассылках или на сайтах ретейлеров
                                        увеличится в
                                        6,3 раза по сравнению с 2016 годом.
                                    </blockquote>
                                    <p>Кроме того, сферу торговли одеждой могут изменить новые барьеры, напряженность в
                                        вопросах
                                        торговли и неопределенность, а новые возможности могут появиться на фоне
                                        усиления
                                        торговли между развивающимися странами и пересмотра торговых соглашений.</p>
                                </div>
                            </div>
                        </div>
                        @include('services.parts.single-bottom-nav')
                    </div>
                    <div class="column is-4">
                        @include('services.parts.single-aside')
                    </div>
                </div>
            </div>
        </section>
        @include('services.parts.single-similar')
    </div>
@endsection
