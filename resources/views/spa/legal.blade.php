@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')
    <div class="container">
        <div class="columns">
            <div class="column is-4">
                @include('spa.aside')
            </div>
            <div class="column is-8">
                <section class="section pt-1">

                    <h1 class="section-title">Условия и договора</h1>


                    <div class="box">
                        <div class="content">
                            <div class="is-size-875">

                                <h3>Продукты для покупателей</h3>
                                <p>
                                    Настоящий документ «Политика конфиденциальности» (далее — по тексту —
                                    «Политика»)
                                    представляет собой правила использования Обществом с ограниченной
                                    ответственностью
                                    «Хабр» персональной информации Пользователя.</p>
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

                                <h3 class="pt-1">Продукты для продавцов</h3>
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

                                <h3 class="pt-1">Продукты для продавцов</h3>
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
@endsection
