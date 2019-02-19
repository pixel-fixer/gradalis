@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <section class="section py-0">
        <div class="container">
            <div class="columns">
                <div class="column is-4">
                    <aside class="pt-1">
                        <nav class="aside-nav px-0">
                            <h3 class="px-1-5 mb-0-5">Теория</h3>
                            <ul class="px-1-5 menu-level-menu">
                                <li class="aside-nav__item">
                                    <a @click="toggleClassActive" class="sub-menu-toggle">
                                        <span class="aside-nav__item__title">Партнерский маркетинг</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="aside-nav__item">
                                            <a href="#">
                                                <span class="aside-nav__item__title">Что такое партнерская сеть</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="aside-nav__item">
                                    <a href="#">
                                        <span class="aside-nav__item__title">СРА и многие другие</span>
                                    </a>
                                </li>
                            </ul>
                            <hr class="hr-basic my-1">
                            <h3 class="px-1-5 mb-0-5">Начало работы</h3>
                            <ul class="px-1-5 menu-level-menu">
                                <li class="aside-nav__item">
                                    <a @click="toggleClassActive" class="sub-menu-toggle">
                                        <span class="aside-nav__item__title">Партнерский маркетинг</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="aside-nav__item">
                                            <a href="#">
                                                <span class="aside-nav__item__title">Что такое партнерская сеть</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="aside-nav__item">
                                    <a href="#">
                                        <span class="aside-nav__item__title">СРА и многие другие</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </aside>

                </div>
                <div class="column is-8">
                    <section class="section pt-1 pb-0 px-0">
                        <h1 class="section-title mb-1-75">Помощь</h1>
                    </section>
                    <section class="section pt-0 px-0">
                        <div class="box">
                            <div class="content">
                                <div class="is-size-875">

                                    <h3>Партнерский маркетинг</h3>
                                    <p>
                                        Настоящий документ «Политика конфиденциальности» (далее — по тексту — «Политика»)
                                        представляет собой правила использования Обществом с ограниченной ответственностью
                                        «Хабр» персональной информации Пользователя.
                                    </p>
                                    <p>
                                        <a href="#" class="has-text-decoration-underline">Глава номер 10</a>
                                    </p>
                                    <p>
                                        <a href="#" class="link-doc">
                                            <img src="{{ asset('/svg/icons/files/ic_pdf.svg') }}" class="svg icon-doc"
                                                 alt="PDF">
                                            <span class="has-text-decoration-underline">Пользовательское соглашение и политика конфиденциальности</span>
                                        </a>
                                    </p>

                                    <h3 class="pt-1">СРА и многие другие</h3>
                                    <p>
                                        Настоящая Политика является неотъемлемой частью Пользовательского соглашения
                                        (далее — «Соглашение»), размещенного и/или доступного в сети Интернет по адресу:
                                        http://freelansim.ru/info/legal/agreement, а также иных заключаемых с
                                        Пользователем договоров, когда это прямо предусмотрено их условиями.</p>
                                    <p>
                                        <a href="#" class="has-text-decoration-underline">Основные документы</a>
                                    </p>
                                    <p>
                                        <a href="#" class="link-doc">
                                            <img src="{{ asset('/svg/icons/files/ic_pdf.svg') }}" class="svg icon-doc"
                                                 alt="PDF">
                                            <span class="has-text-decoration-underline">Пользовательское соглашение и политика конфиденциальности</span>
                                        </a>
                                    </p>

                                    <h3 class="pt-1">Трафик</h3>
                                    <p>
                                        Настоящая Политика является неотъемлемой частью Пользовательского соглашения
                                        (далее — «Соглашение»), размещенного и/или доступного в сети Интернет по адресу:
                                        http://freelansim.ru/info/legal/agreement, а также иных заключаемых с
                                        Пользователем договоров, когда это прямо предусмотрено их условиями.</p>
                                    <p>
                                        <a href="#" class="has-text-decoration-underline">Основные документы</a>
                                    </p>
                                    <p>
                                        <a href="#" class="link-doc">
                                            <img src="{{ asset('/svg/icons/files/ic_pdf.svg') }}" class="svg icon-doc"
                                                 alt="PDF">
                                            <span class="has-text-decoration-underline">Пользовательское соглашение и политика конфиденциальности</span>
                                        </a>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>

@endsection
