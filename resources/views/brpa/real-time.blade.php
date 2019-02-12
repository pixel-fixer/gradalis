@extends('layouts.app')

@section('content')

    @include('includes.breadcrumb')

    <div class="container broker-pa">
        <div class="broker-pa__header">
            <div class="columns is-multiline">
                <div class="column is-8-desktop is-12-tablet">
                    <h1 class="section-title mb-0-5">В реальном времени</h1>
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

        <section>
            <!-- Swiper -->
            <div class="swiper-container swiper-broker-data-indicators">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Appr. Leads</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Целей оплачено</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="broker-data-indicator">
                            <div class="broker-data-indicator__title">
                                <span class="is-size-875 has-text-basic">Показы</span>
                                <span class="icon icon-1" v-tooltip="'tooltip text'">
                                   <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                                </span>
                            </div>
                            <div class="broker-data-indicator__value has-text-weight-bold">
                                12 580
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-broker-data-indicators-next"></div>
                <div class="swiper-button-prev swiper-broker-data-indicators-prev"></div>
            </div>
        </section>

        <div class="columns is-multiline">
            <div class="column is-6">
                <broker-real-time-indicators></broker-real-time-indicators>
            </div>
            <div class="column is-6">
                <broker-real-time-indicators></broker-real-time-indicators>
            </div>
        </div>

        <section class="section is-paddingless content box">
            <table class="table is-fullwidth is-size-875 is-paddingless has-background-white broker-pa__realtime-table">
                <thead class="bb">
                <tr class="has-background-info">
                    <th colspan="2" class="has-text-white has-text-centered">По офферам</th>
                    <th colspan="3" class="has-text-white has-text-centered">Трафик</th>
                    <th colspan="3" class="has-text-white has-text-centered">Лиды</th>
                    <th colspan="2" class="has-text-white has-text-centered">Комиссия</th>
                </tr>
                <tr>
                    <th class="">ID</th>
                    <th class="">Название</th>
                    <th class="no-wrap">
                        <span>Показы</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th class="no-wrap">
                        <span>Хиты</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th class="no-wrap">
                        <span>Клики</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th class="no-wrap">
                        <span>Открытая</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th class="no-wrap">
                        <span>Одобрена</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th class="no-wrap">
                        <span>Целей оплачено</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th class="no-wrap">
                        <span>Открытая</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                    <th class="no-wrap">
                        <span>Одобренная</span>
                        <span class="icon icon-1" v-tooltip="'tooltip text'">
                           <img src="/svg/icons/ic_help.svg" class="svg" alt="">
                        </span>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="">1</td>
                    <td class="has-text-basic has-line-height-normal"><a href="#">Невский проспеспект...</a></td>
                    <td class="">12 580</td>
                    <td class="">14 580</td>
                    <td class="">1 580</td>
                    <td class="">8</td>
                    <td class="">2</td>
                    <td class="">2</td>
                    <td class="has-text-weight-bold">0.00</td>
                    <td class="has-text-weight-bold">0.00</td>
                </tr>
                <tr>
                    <td class="">2</td>
                    <td class="has-text-basic has-line-height-normal"><a href="#">Невский проспеспект...</a></td>
                    <td class="">12 580</td>
                    <td class="">14 580</td>
                    <td class="">1 580</td>
                    <td class="">8</td>
                    <td class="">2</td>
                    <td class="">2</td>
                    <td class="has-text-weight-bold ">0.00</td>
                    <td class="has-text-weight-bold">0.00</td>
                </tr>
                <tr>
                    <td class="">3</td>
                    <td class="has-text-basic has-line-height-normal"><a href="#">Невский проспеспект...</a></td>
                    <td class="">12 580</td>
                    <td class="">14 580</td>
                    <td class="">1 580</td>
                    <td class="">8</td>
                    <td class="">2</td>
                    <td class="">2</td>
                    <td class="has-text-weight-bold">0.00</td>
                    <td class="has-text-weight-bold">0.00</td>
                </tr>
                </tbody>
            </table>
        </section>
    </div>
@endsection
