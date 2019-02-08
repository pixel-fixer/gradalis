@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <div class="container broker-pa">
        <div class="broker-pa__header">
            <div class="columns is-multiline">
                <div class="column is-8-desktop is-12-tablet">
                    <h1 class="section-title mb-0-5">Банк Хоум Кредит: Дебетовая карта Польза</h1>
                    <div class="broker-pa__id">ID: 2556</div>
                </div>
                <div class="column is-4-desktop is-12-tablet">
                    <div class="buttons">
                        <button class="button is-outlined is-info is-size-875 has-text-weight-bold h-3 px-1">
                        <span class="icon">
                          <img src="/svg/icons/ic_lifesaver-2.svg" alt="" class="svg">
                        </span>
                            <span>Помощь</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @include('brpa.offers.nav')

        <section class="section is-paddingless content">
            <h3>Инструменты</h3>
            <div class="is-size-875 has-text-basic">
                <p>
                    Для того, чтобы использовать все возможности нашей высокотехнологичной системы, подключайте
                    разработанные специально для вебмастеров инструменты, которые помогут эффективнее монетизировать Ваш
                    трафик. Каждый инструмент использует систему ретаргетинга, чтобы максимально конвертировать каждого
                    посетителя Вашего сайта в прибыль.
                </p>
            </div>
            <h3>Ссылки <span class="has-text-grey-light has-text-weight-normal">[1]</span></h3>
            <div class="filter-table-offers-links is-size-875">
                <div class="filter-table-offers-links__type is-flex">
                    <div class="filter-table-offers-links__type__title">Категории:</div>
                    <ul>
                        <li><span class="is-active">Все</span></li>
                        <li><span>Лендинг</span></li>
                        <li><span>Баннеры</span></li>
                    </ul>
                </div>
                <div class="filter-table-offers-links__type is-flex">
                    <div class="filter-table-offers-links__type__title">Тип:</div>
                    <ul>
                        <li><span class="is-active">Все</span></li>
                        <li><span>Стандартные</span></li>
                    </ul>
                </div>
            </div>
            <table class="table is-striped is-fullwidth is-size-875">
                <thead>
                <tr>
                    <th>Название ссылки</th>
                    <th>Категории</th>
                    <th>Тип</th>
                    <th>
                        <span>CR</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody class="box is-paddingless">
                <tr>
                    <td>Стандартная</td>
                    <td>Лендинг</td>
                    <td>Стандартные</td>
                    <td>18.84 - 24.73</td>
                    <td>
                        <div class="is-flex">
                            <a href="#" class="link-with-icon mr-1">
                                <img src="{{ asset('/svg/icons/ic_details.svg') }}">
                                <span class="has-text-decoration-underline">Перейти на сайт</span>
                            </a>
                            <a href="#" class="link-with-icon">
                                <img src="{{ asset('/svg/icons/ic_link.svg') }}">
                                <span class="has-text-decoration-underline">Сгенерировать ссылку</span>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Стандартная</td>
                    <td>Лендинг</td>
                    <td>Стандартные</td>
                    <td>18.84 - 24.73</td>
                    <td>
                        <div class="is-flex">
                            <a href="#" class="link-with-icon mr-1">
                                <img src="{{ asset('/svg/icons/ic_details.svg') }}">
                                <span class="has-text-decoration-underline">Перейти на сайт</span>
                            </a>
                            <a href="#" class="link-with-icon">
                                <img src="{{ asset('/svg/icons/ic_link.svg') }}">
                                <span class="has-text-decoration-underline">Сгенерировать ссылку</span>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Стандартная</td>
                    <td>Лендинг</td>
                    <td>Стандартные</td>
                    <td>18.84 - 24.73</td>
                    <td>
                        <div class="is-flex">
                            <a href="#" class="link-with-icon mr-1">
                                <img src="{{ asset('/svg/icons/ic_details.svg') }}">
                                <span class="has-text-decoration-underline">Перейти на сайт</span>
                            </a>
                            <a href="#" class="link-with-icon">
                                <img src="{{ asset('/svg/icons/ic_link.svg') }}">
                                <span class="has-text-decoration-underline">Сгенерировать ссылку</span>
                            </a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </section>
    </div>
@endsection
