@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')
    <div class="container">
        <div class="columns">
            <div class="column is-4">
                @include('spa.aside')
            </div>
            <div class="column is-8">
                <section class="section pt-1 px-0">
                    <h1 class="section-title mb-1-75">Купленные продукты</h1>
                    <table class="table is-fullwidth is-size-875">
                        <thead>
                        <tr>
                            <th style="padding-right: 0;">№</th>
                            <th>Назавание продукта</th>
                            <th>Статус</th>
                            <th>Результат</th>
                        </tr>
                        </thead>
                        <tbody class="box is-paddingless">
                        <tr>
                            <td class="has-text-basic">1</td>
                            <td>
                                <div class="is-flex card-service_table">
                                    <figure class="card-service_table__icon">
                                        <img src="{{ asset('/svg/icons/services/ic_translate.svg') }}" alt="">
                                    </figure>
                                    <div class="card-service_table__info">
                                        <h4>Перевод документов</h4>
                                        <time>12 марта 2019</time>
                                    </div>
                                </div>
                            </td>
                            <td class="has-text-basic">Новая заявка</td>
                            <td>
                                <a href="#" class="link-with-icon">
                                    <img src="{{ asset('/svg/icons/ic_details.svg') }}" alt="Details">
                                    <span class="has-text-decoration-underline">Посмотреть результат</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="has-text-basic">2</td>
                            <td>
                                <div class="is-flex card-service_table">
                                    <figure class="card-service_table__icon">
                                        <img src="{{ asset('/svg/icons/services/ic_translate.svg') }}" alt="">
                                    </figure>
                                    <div class="card-service_table__info">
                                        <h4>Перевод документов</h4>
                                        <time>10 марта 2019</time>
                                    </div>
                                </div>
                            </td>
                            <td class="has-text-warning">В процессе</td>
                            <td>
                                <a href="#" class="link-with-icon">
                                    <img src="{{ asset('/svg/icons/ic_details.svg') }}" alt="Details">
                                    <span class="has-text-decoration-underline">Посмотреть результат</span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="has-text-basic">3</td>
                            <td>
                                <div class="is-flex card-service_table">
                                    <figure class="card-service_table__icon">
                                        <img src="{{ asset('/svg/icons/services/ic_translate.svg') }}" alt="">
                                    </figure>
                                    <div class="card-service_table__info">
                                        <h4>Перевод документов</h4>
                                        <time>20 февраля 2019</time>
                                    </div>
                                </div>
                            </td>
                            <td class="has-text-success">Выполненно</td>
                            <td>
                                <a href="#" class="link-with-icon">
                                    <img src="{{ asset('/svg/icons/ic_details.svg') }}" alt="Details">
                                    <span class="has-text-decoration-underline">Посмотреть результат</span>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>
@endsection
