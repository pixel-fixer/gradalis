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
                                <h1 class="mb-2">Процесс подбора бизнеса от
                                    компании Name Company</h1>
                                <div class="mt-1 mb-2">
                                    <div class="timeline-process mb-1 mt-1">
                                        <div class="timeline-process__item">
                                            <div class="timeline-process__item__tag">
                                            <span
                                                class="tag is-danger has-text-uppercase has-text-weight-bold is-rounded">Шаг 1</span>
                                            </div>
                                            <div class="timeline-process__item__marker has-background-white">
                                                <img src="/svg/icons/service-process/ic_personla_manager.svg" alt="">
                                            </div>
                                            <div class="timeline-process__item__content">
                                                <h3 class="mb-0">Отправка заявки</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <p>
                                            Наш специалист организует показы предприятий и переговоры по
                                            заинтересовавшим
                                            Вас вариантам. Бизнес-брокеры понимают переговорную специфику, помогут
                                            провести
                                            торг по цене и достичь выгодных условий по сделке.
                                        </p>
                                        <p>
                                            В рамках договора на поиск, мы берем на себя юридическое сопровождение
                                            сделки по
                                            приобретению бизнеса.
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-1 mb-2">
                                    <div class="timeline-process mb-1">
                                        <div class="timeline-process__item">
                                            <div class="timeline-process__item__tag">
                                            <span
                                                class="tag is-danger has-text-uppercase has-text-weight-bold is-rounded">Шаг 2</span>
                                            </div>
                                            <div class="timeline-process__item__marker has-background-white">
                                                <img src="/svg/icons/service-process/ic_priority.svg" alt="">
                                            </div>
                                            <div class="timeline-process__item__content">
                                                <h3 class="mb-0">Подготовка документов</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <ol class="ol-big-counter is-outlined is-link is-striped">
                                            <li>Подготовка документов. На этом этапе мы готовим и предоставляем Вам на
                                                подпись комлект документов.
                                                <ol>
                                                    <li>Заявки на государственную регистрацию обозначения в качестве
                                                        товарного знака, знака обслуживания, коллективного знака
                                                        в РФ
                                                    </li>
                                                    <li>Доверенности на нашего юриста для подачи документов</li>
                                                    <li>Согласие на обработку персональных данных</li>
                                                    <li>Квитанцию на оплату госпошлины</li>
                                                </ol>
                                            </li>
                                            <li>Отправка документов в Роспатент и получение обратной связи</li>
                                            <li>Процедура регистрации Товарного Знака</li>
                                            <li>Получение свидетельства о регистрации товарного знака в Роспатенте</li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="mt-1 mb-2">
                                    <div class="timeline-process mb-1 mt-1">
                                        <div class="timeline-process__item">
                                            <div class="timeline-process__item__tag">
                                            <span
                                                class="tag is-danger has-text-uppercase has-text-weight-bold is-rounded">Шаг 3</span>
                                            </div>
                                            <div class="timeline-process__item__marker has-background-white">
                                                <img src="/svg/icons/service-process/ic_cold_search.svg" alt="">
                                            </div>
                                            <div class="timeline-process__item__content">
                                                <h3 class="mb-0">Осмотр и оценка</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <p>
                                            Компаниям нужно подготовить планы экстренных мероприятий на случай возможной
                                            реорганизации мировых производственно-бытовых связей.
                                        </p>
                                        <ul>
                                            <li>Бизнес-план</li>
                                            <li>Интеграция</li>
                                            <li>Вторичная бухгалтерия</li>
                                        </ul>
                                        <p>
                                            Кроме того, сферу торговли одеждой могут изменить новые барьеры,
                                            напряженность в вопросах торговли и неопределенность, а новые возможности
                                            могут появиться на фоне усиления торговли между развивающимися странами и
                                            пересмотра торговых соглашений.
                                        </p>
                                    </div>
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
