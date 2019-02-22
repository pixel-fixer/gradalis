@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <section class="section pt-1 pb-0">
        <div class="container">
            <h1 class="section-title mb-0">Вакансии</h1>
        </div>
    </section>
    <section class="section pt-1 pb-1">
        <div class="container">
            <div class="vacancy-list">
                <article class="vacancy mb-1">
                    <h2 class="vacancy__title mb-1"><a href="#">Помощник юриста</a></h2>
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
                    <div class="mb-1">
                        <p>
                            Первичное консультирование клиента по телефону, выяснение вопроса клиента, предоставление
                            вариантов решения вопроса. - Запись клиентов на консультацию к опытным практикующим юристам.
                            Нацеленность на результат, настойчивость, уверенность в себе. - Обучаемость и
                            внимательность. - Юридическое образование. - Грамотная и четкая устная речь. - Умение быстро
                            устанавливать...
                        </p>
                    </div>
                    <div class="buttons mb-1">
                        <a href="/vacancy/single" class="button is-info is-outlined h-3 px-1 has-text-weight-bold is-size-875">
                            Подробнее
                        </a>
                    </div>
                </article>
                <article class="vacancy mb-1">
                    <h2 class="vacancy__title mb-1"><a href="#">Помощник юриста</a></h2>
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
                    <div class="mb-1">
                        <p>
                            Первичное консультирование клиента по телефону, выяснение вопроса клиента, предоставление
                            вариантов решения вопроса. - Запись клиентов на консультацию к опытным практикующим юристам.
                            Нацеленность на результат, настойчивость, уверенность в себе. - Обучаемость и
                            внимательность. - Юридическое образование. - Грамотная и четкая устная речь. - Умение быстро
                            устанавливать...
                        </p>
                    </div>
                    <div class="buttons mb-1">
                        <a href="/vacancy/single" class="button is-info is-outlined h-3 px-1 has-text-weight-bold is-size-875">
                            Подробнее
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="section py-1">
        <div class="container">
            @include('includes.pagination')
        </div>
    </section>

@endsection
