@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <section class="section pt-1">
        <div class="container">
            <div class="vacancy-list">
                <article class="vacancy">
                    <div class="columns is-multiline">
                        <div class="column is-10 pb-0">
                            <h1 class="vacancy__title section-title mb-0">Помощник юриста</h1>
                        </div>
                        <div class="column is-2 pb-0 has-text-right-tablet">
                            <div class="vacancy__salary has-text-weight-bold">от €800</div>
                        </div>
                    </div>
                    <div class="vacancy__location">
                        <img src="{{ asset('/svg/icons/ic_location.svg') }}">
                        <span>Россия, г. Санкт-Петербург</span>
                    </div>
                    <div class="vacancy__short-info mb-1">
                        <ul>
                            <li>Полный день</li>
                            <li>Русский и Английский</li>
                        </ul>
                    </div>
                    <div class="buttons">
                        <button class="button is-info h-3 px-1 has-text-weight-bold is-size-875"
                                @click="vacancy.showResponseModal = true">
                            Откликнуться
                        </button>
                        <button
                            class="button is-info is-outlined has-text-left-mobile h-3 px-1 has-text-weight-bold is-size-875">
                            Регистрация брокера продавца бизнеса
                        </button>
                    </div>
                    <div class="content mb-1">
                        <p>
                            Мы - молодая юридическая компания. Занимаемся правовым сопровождением бизнеса. Основные
                            сферы практики - договоры, интеллектуальная собственность, корпоративное право. Реже -
                            налоги, трудовые вопросы, персональные данные. Почти никогда - гос органы, суды.
                        </p>
                        <p>
                            Ищем толкового сотрудника, который видит себя в юриспруденции. Мы готовы обучать и
                            подсказывать. Взамен требуем профессионального отношения к делу, качественного и
                            ответственного подхода к работе.
                        </p>
                        <p style="font-weight: bold; margin-bottom: 0;">
                            Обязанности:
                        </p>
                        <ul>
                            <li>составление/редактирование договоров</li>
                            <li>изучение вопросов клиентов</li>
                            <li>поиск путей решения задач клиентов</li>
                            <li>анализ рисков найденных решений</li>
                            <li>поиск путей минимизации рисков</li>
                        </ul>
                        <p style="font-weight: bold; margin-bottom: 0;">
                            Требования:
                        </p>
                        <ul>
                            <li>высшее юридическое образование (в том числе,студенты 3-4 курсов)</li>
                            <li>ответственность</li>
                            <li>желание и умение учиться в ходе работы</li>
                        </ul>
                        <p style="font-weight: bold; margin-bottom: 0;">
                            Условия:
                        </p>
                        <ul>
                            <li>белая заработная плата по трудовому договору</li>
                            <li>удаленная работа (не в офисе)</li>
                        </ul>
                    </div>
                    <hr class="hr-basic">
                    <div class="buttons">
                        <button class="button is-info h-3 px-1 has-text-weight-bold is-size-875"
                                @click="vacancy.showResponseModal = true">
                            Откликнуться
                        </button>
                        <button
                            class="button is-info is-outlined has-text-left-mobile h-3 px-1 has-text-weight-bold is-size-875">
                            Регистрация брокера продавца бизнеса
                        </button>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <vacancy-response v-model="vacancy.showResponseModal"></vacancy-response>

@endsection
